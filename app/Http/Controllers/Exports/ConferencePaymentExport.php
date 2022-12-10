<?php

namespace App\Http\Controllers\Exports;

use App\Models\ConferencePayment;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class ConferencePaymentExport extends BuilderCsvExport
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export(): StreamedResponse
    {
        $query = ConferencePayment::with([
            'user.companions',
            'accommodations.room',
        ])
            ->completed()
            ->orderBy('id', 'desc');

        $fileName = $this->getFileName('conference-payments');

        return $this->sendCsvResponse($query, $fileName);
    }

    protected function getHeader($item = null): array
    {
        return [
            'Reg. ID',
            'Transaction ID',
            'Name',
            'Email',
            'Phone',
            'Registration Type',
            'Amount',
            'Date',
            'Pickup + Drop',
            'Airplane Booking',
            'Accompanying Persons',
            'Accommodation',
        ];
    }

    protected function getRow($item): array
    {
        return [
            $item->user->registration_id,
            $item->transaction_id ?? 'N/A',
            $item->user->name,
            $item->user->email,
            $item->user->phone,
            $item->user?->role?->name ?? 'N/A',
            number_format($item->amount),
            $item->created_at,
            $item->pickup_drop ? 'Yes' : 'No',
            $item->airplane_booking ? 'Yes' : 'No',
            $this->displayCompanions($item),
            $this->displayAccommodation($item),
        ];
    }

    private function displayCompanions($item): string
    {
        $result = '';

        foreach ($item->user->companions as $companion) {
            $result .= $companion->getDisplayName() . ';';
        }

        return $result;
    }

    private function displayAccommodation($item): string
    {
        $result = '';

        foreach ($item->accommodations as $userRoom) {
            $resultItem = "{$userRoom->room->room_category}: {$userRoom->room->currency} {$userRoom->room->amount}";
            $resultItem .= PHP_EOL . "Room(s) {$userRoom->room_count}";
            $resultItem .= PHP_EOL . "Date {$userRoom->booking_date}";

            $result .= $resultItem;
        }

        return $result;
    }
}
