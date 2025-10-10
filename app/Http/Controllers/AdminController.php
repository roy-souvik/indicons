<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exports\AbstractExport;
use App\Http\Controllers\Exports\AdminRegistrationsExport;
use App\Http\Controllers\Exports\ConferencePaymentExport;
use App\Mail\AbstractSend;
use App\Mail\AbstractUpdated;
use App\Mail\AdminRegisterConfirmation;
use App\Mail\PaymentSuccess;
use App\Models\AbstractEmailLog;
use App\Models\AdminRegistration;
use App\Models\ConferenceAbstract;
use App\Models\ConferencePayment;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\RegistrationCharge;
use App\Models\Role;
use App\Models\SiteConfig;
use App\Models\Sponsorship;
use App\Models\SponsorshipFeature;
use App\Models\SponsorshipPayment;
use App\Models\User;
use App\Models\VaiMember;
use App\Models\WorkshopPayment;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $registrationCount = ConferencePayment::completed()->count();
        $abstractCount = ConferenceAbstract::count();
        $workshopRegistrationCount = WorkshopPayment::completed()->count();

        return view('admin.home', compact('registrationCount', 'abstractCount', 'workshopRegistrationCount'));
    }

    public function conferencePayments()
    {
        $payments = ConferencePayment::with([
            'registrationCharge',
            'user.companions',
            'accommodations.room',
        ])
            ->completed()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.conference-payments', compact('payments'));
    }

    public function workshopPayments()
    {
        $payments = WorkshopPayment::with(['user', 'workshopUsers'])->completed()->orderBy('id', 'desc')->get();

        return view('admin.workshop-payments', compact('payments'));
    }

    public function userPayments()
    {
        $users = User::with(['conferencePayments.registrationCharge', 'workshopPayments'])->get();

        return view('admin.user-payments', compact('users'));
    }

    public function abstractList()
    {
        $abstracts = ConferenceAbstract::with(['user', 'emailLogs'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.abstracts', compact('abstracts'));
    }

    public function manageFeesStructure()
    {
        $charges = RegistrationCharge::with([
            'registrationPeriod',
            'role',
            'delegateType',
        ])->get();

        return view('admin.fees-structure', compact('charges'));
    }

    public function updateFeesStructure(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
        ]);

        $requestData = $request->only([
            'id',
            'amount',
        ]);

        $charge = RegistrationCharge::where('id', data_get($requestData, 'id'))->firstOrFail();

        $charge->amount = data_get($requestData, 'amount');

        $charge->save();

        return $charge;
    }

    public function abstractUpdate(Request $request)
    {
        $requestData = $request->only([
            'id',
            'confirmed'
        ]);

        $request->validate([
            'id' => ['required', 'integer'],
            'confirmed' => ['boolean'],
        ]);

        try {
            $abstract = ConferenceAbstract::with(['user'])->findOrFail(data_get($requestData, 'id'));

            $abstract->confirmed = data_get($requestData, 'confirmed');

            $abstract->save();

            if (!empty($abstract->confirmed)) {
                $status = 'confirmed';
            } else {
                $status = 'declined';
            }

            Mail::to($abstract->user)->send(new AbstractUpdated($abstract, $status));

            $message = "Abstract {$abstract->abstract_id} is {$status}";

            return back()->with('success', $message);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function sponsorshipShow()
    {
        $sponsorships = Sponsorship::all();

        return view('admin.sponsorship-list', compact('sponsorships'));
    }

    public function sponsorshipFeaturesShow(Sponsorship $sponsorship)
    {
        $sponsorship->load('features');

        return view('admin.sponsorship-features', compact('sponsorship'));
    }

    public function sponsorshipFeaturesCreate(Sponsorship $sponsorship, Request $request)
    {
        $feature = new SponsorshipFeature();

        $feature->sponsorship_id = $sponsorship->id;
        $feature->title = $request->title;

        $feature->save();

        return redirect()->back()->with([
            'success' => 'Feature created successfully',
        ]);
    }

    public function sponsorshipFeaturesDelete(SponsorshipFeature $feature)
    {
        $feature->delete();

        return redirect()->back()->with([
            'success' => 'Feature deleted successfully',
        ]);
    }

    public function sponsorshipDelete(Sponsorship $sponsorship)
    {
        $sponsorship->delete();

        return redirect()->back()->with([
            'success' => 'Sponsorship deleted successfully',
        ]);
    }

    public function sponsorshipEdit(Sponsorship $sponsorship)
    {
        return view('admin.sponsorship-edit', compact('sponsorship'));
    }

    public function sponsorshipUpdate(Sponsorship $sponsorship, Request $request)
    {
        $sponsorship->title = data_get($request, 'title', $sponsorship->title);
        $sponsorship->amount = data_get($request, 'amount', $sponsorship->amount);
        $sponsorship->number = data_get($request, 'number', $sponsorship->number);
        $sponsorship->color = data_get($request, 'color', $sponsorship->color);

        $sponsorship->save();

        return redirect(route('admin.sponsorship.show'))->with([
            'success' => 'Sponsorship updated successfully',
        ]);
    }

    public function configShow()
    {
        $configList = SiteConfig::all();

        return view('admin.config', compact('configList'));
    }

    public function configUpdate(SiteConfig $config, Request $request)
    {
        $request->validate([
            'config_value' => ['required', 'string', 'nullable'],
        ]);

        $config->value = $request->input('config_value');

        $config->save();

        return $config;
    }

    public function sponsorshipPaymentsShow()
    {
        $sponsorshipPayments = SponsorshipPayment::with(['sponsorship', 'user'])->get();

        return view('admin.sponsorship-payments', compact('sponsorshipPayments'));
    }

    public function workshopPaymentsShow()
    {
        $payments = WorkshopPayment::with(['workshopUsers', 'user'])->orderBy('id', 'desc')->get();

        return view('admin.workshop-payments', compact('payments'));
    }

    public function vaiMembersShow()
    {
        $members = VaiMember::all();

        return view('admin.vai-members', compact('members'));
    }

    public function conferenceRegistrations()
    {
        $roles = Role::forConference()->active()->get();
        $users = User::whereNotIn('role_id', $roles->pluck('id')->toArray())->get();

        return view('admin.conference-registrations', compact('users'));
    }

    public function resendConferenceEmail(Request $request)
    {
        $request->validate([
            'txn_id' => ['required', 'string'],
            'user_id' => ['required', 'integer'],
        ]);

        $user = User::findOrFail($request->user_id);
        $payment = ConferencePayment::where('transaction_id', $request->txn_id)->where('user_id', $user->id)->firstOrFail();

        Mail::to($user)->send(new PaymentSuccess($payment->transaction_id));

        return response()->json([
            'data' => $payment,
        ]);
    }

    public function paymentPdf(Request $request)
    {
        $transactionId = $request->transaction_id;

        $data = ConferencePayment::getPaymentReceiptData($transactionId);

        $pdf = Pdf::loadView('emails.payment-success', $data);

        return $pdf->download($transactionId . '.pdf');
    }

    public function exportPayments()
    {
        return (new ConferencePaymentExport())->export();
    }

    public function exportAbstracts()
    {
        return (new AbstractExport())->export();
    }

    public function sendAbstract(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'abstract_id' => ['required', 'numeric'],
        ]);

        $abstract = ConferenceAbstract::findOrFail($request->abstract_id);

        $email = $request->input('email');

        try {
            Mail::to($email)->send(new AbstractSend($abstract));

            $log = new AbstractEmailLog();
            $log->abstract_id = $abstract->id;
            $log->sender_id = auth()->user()->id;
            $log->recipient_email = $email;
            $log->sender_ip = $request->ip();

            $log->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function showRegistratons(Request $request)
    {
        $request->validate([
            'st_dt' => ['date', 'date_format:Y-m-d', 'before_or_equal:end_dt'],
            'end_dt' => ['date', 'date_format:Y-m-d', 'after_or_equal:st_dt'],
        ]);

        if ($request->input('st_dt') && $request->input('end_dt')) {
            $registrations = AdminRegistration::whereBetween('created_at', [
                $request->input('st_dt'),
                $request->input('end_dt'),
            ])->get();
        } else {
            $registrations = AdminRegistration::all();
        }

        return view('admin.registrations', compact('registrations'));
    }

    public function showCreateUsersPage()
    {
        $hotelBookingStartConfig = SiteConfig::where('name', 'hotel_booking_start')->first();
        $hotelBookingEndConfig = SiteConfig::where('name', 'hotel_booking_end')->first();

        $bookingPeriod = CarbonPeriod::create(
            $hotelBookingStartConfig->value,
            $hotelBookingEndConfig->value,
        );

        return view('admin.create-registration', compact('bookingPeriod'));
    }

    public function createUsers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:200', 'unique:admin_registrations'],
            'address' => ['string', 'max:250'],
            'home_pickup_drop' => ['required', 'boolean'],
            'conference_city_pickup_drop' => ['required', 'boolean'],
            'airplane_booking' => ['required', 'boolean'],
            'stay_dates' => ['required'],
        ]);

        try {
            $adminRegister = new AdminRegistration();

            $adminRegister->name = $request->input('name');
            $adminRegister->phone = $request->input('phone');
            $adminRegister->email = $request->input('email');
            $adminRegister->address = $request->input('address');
            $adminRegister->home_pickup_drop = $request->input('home_pickup_drop');
            $adminRegister->conference_city_pickup_drop = $request->input('conference_city_pickup_drop');
            $adminRegister->airplane_booking = $request->input('airplane_booking');
            $adminRegister->stay_dates = implode(',', $request->input('stay_dates'));

            $adminRegister->save();

            return redirect(route('admin.register.show'))->with([
                'success' => 'Registration added successfully.',
            ]);
        } catch (\Throwable $th) {
            return redirect(route('admin.register.show'))->with([
                'error' => 'Unable to create registration.',
            ]);
        }
    }

    public function deleteAdminRegistration(int $id)
    {
        $registeration = AdminRegistration::where('id', $id)->firstOrFail();

        $registeration->delete();

        return redirect()->back()->with([
            'success' => 'Deleted successfully',
        ]);
    }

    public function sendRegistrationEmail(Request $request)
    {
        $request->validate([
            'registration_id' => ['required', 'integer'],
        ]);

        $registration = AdminRegistration::where('id', $request->registration_id)->firstOrFail();

        try {
            Mail::to($registration->email)->send(new AdminRegisterConfirmation($registration));

            return response()->json([
                'data' => true,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function exportRegistrations()
    {
        return (new AdminRegistrationsExport())->export();
    }

    public function abstractEmailLogs(ConferenceAbstract $abstract)
    {
        $logs = AbstractEmailLog::where('abstract_id', $abstract->id)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'data' => $logs,
        ]);
    }

    public function imagesIndex()
    {
        $images = Media::with(['category'])->image()->get();

        return view('admin.media.image-list', compact('images'));
    }

    public function imagesCreate()
    {
        $categories = MediaCategory::active()->get();

        return view('admin.media.image-create', compact('categories'));
    }

    public function saveImage(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'integer'],
            'image' => ['required', 'max:8120'],
        ]);

        $filename = null;
        $storePath = public_path(Media::STORE_PATH);
        $documentRootPath = $_SERVER['DOCUMENT_ROOT'] . '/' . Media::STORE_PATH;

        // Ensure directories exist before storing files
        if (!File::exists($storePath)) {
            File::makeDirectory($storePath, 0755, true);
        }

        if (!File::exists($documentRootPath)) {
            File::makeDirectory($documentRootPath, 0755, true);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move($storePath, $filename);

            File::copy($storePath . '/' . $filename, $documentRootPath . '/' . $filename);
        }

        $media = Media::create([
            'title' => $request->title,
            'type_id' => Media::TYPE_IMAGE,
            'path' => $filename,
            'category_id' => $request->category_id,
        ]);

        if ($media) {
            return redirect()
                ->route('admin.images.index')
                ->with('success', 'Image uploaded successfully.');
        }

        return redirect()
            ->back()
            ->with('error', 'Unable to upload image.');
    }


    public function videosIndex()
    {
        $videos = Media::with(['category'])->video()->get();

        return view('admin.media.video-list', compact('videos'));
    }

    public function videosCreate()
    {
        $categories = MediaCategory::active()->get();

        return view('admin.media.video-create', compact('categories'));
    }

    public function saveVideo(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'integer'],
            'video_link' => ['required', 'url'],
        ]);

        $media = Media::create([
            'title' => $request->title,
            'type_id' => Media::TYPE_VIDEO,
            'path' => $request->video_link,
            'category_id' => $request->category_id,
        ]);

        if ($media) {
            return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video saved successfully.');
        }

        return redirect()
            ->back()
            ->with('error', 'Unable to save video.');
    }

    public function destroyMedia(Media $media)
    {
        if ($media->isImage()) {
            unlink(public_path(Media::STORE_PATH) . '/' . $media->path);
            unlink($_SERVER['DOCUMENT_ROOT'] . '/' . Media::STORE_PATH . '/' . $media->path);
        }

        $media->delete();

        return redirect()
            ->back()
            ->with('success', 'Media deleted successfully.');
    }
}
