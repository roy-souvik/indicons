<?php

namespace App\Http\Controllers\Exports;

use App\Models\AdminRegistration;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class AdminRegistrationsExport extends BuilderCsvExport
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export(): StreamedResponse
    {
        $query = AdminRegistration::orderBy('id', 'desc');

        $fileName = $this->getFileName('admin-registrations');

        return $this->sendCsvResponse($query, $fileName);
    }

    protected function getHeader($item = null): array
    {
        return [
            'Reg. ID',
            'Name',
            'Phone',
            'Email',
            'Address',
            'Home city pickup + drop',
            'Kolkata city pickup + drop',
            'Airplane booking',
            'Stay dates',
        ];
    }

    protected function getRow($item): array
    {
        return [
            $item->registration_id,
            $item->name,
            $item->phone,
            $item->email,
            $item->address,
            $item->home_pickup_drop ? 'Yes' : 'No',
            $item->conference_city_pickup_drop ? 'Yes' : 'No',
            $item->airplane_booking ? 'Yes' : 'No',
            $item->stay_dates,
        ];
    }
}
