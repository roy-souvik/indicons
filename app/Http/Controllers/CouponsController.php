<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('admin.coupons', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'coupon_count' => ['required', 'integer', 'min:1', 'max:20'],
            'percent_off' => ['required', 'integer', 'min:1', 'max:90'],
        ]);

        $couponCodes = collect();

        for ($i = 1; $i <= $request->coupon_count; $i++) {
            $code = Coupon::generateUniqueCode();
            $couponCodes->push($code);
        }

        foreach ($couponCodes as $couponCode) {
            $coupon = new Coupon();
            $coupon->code = $couponCode;
            $coupon->percent_off = $request->input('percent_off', 0);

            $coupon->save();
        }

        return redirect(route('admin.coupons.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);

        if (!empty($coupon->user_id)) {
            throw ValidationException::withMessages([
                'coupon' => 'Coupon is in use',
            ]);
        }

        $coupon->delete();

        return redirect(route('admin.coupons.index'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'coupon_code' => ['required', 'string'],
        ]);

        $couponCode = $request->coupon_code;

        $coupon = Coupon::findByCode($couponCode);

        if (empty($coupon)) {
            throw ValidationException::withMessages([
                'coupon' => 'Invalid Coupon code.',
            ]);
        }

        if (!empty($coupon->user_id)) {
            throw ValidationException::withMessages([
                'coupon' => 'Coupon is in use.',
            ]);
        }

        if (empty($coupon->is_active)) {
            throw ValidationException::withMessages([
                'coupon' => 'Coupon is not active.',
            ]);
        }

        $userId = auth()->user()->id;

        $request->session()->put(Coupon::storageKey($userId), $coupon->code);

        return response()->json([
            'data' => $coupon,
        ]);
    }

    public function unapply(Request $request)
    {
        $userId = auth()->user()->id;

        $request->session()->forget(Coupon::storageKey($userId));

        return response()->json([
            'data' => true,
        ]);
    }
}
