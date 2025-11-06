<?php

namespace App\Http\Controllers\Exports;

use App\Models\WorkshopPayment;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class WorkshopExport extends BuilderCsvExport
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export(): StreamedResponse
    {
        $query = WorkshopPayment::with(['user', 'workshopUsers'])->completed()->orderBy('id', 'desc');

        $fileName = $this->getFileName('workshop_payments');

        return $this->sendCsvResponse($query, $fileName);
    }

    protected function getHeader($item = null): array
    {
        return [
            'Name',
            'Email & Phone',
            'Workshop',
            'Amount',
            'Date',
        ];
    }

    protected function getRow($item): array
    {
        $workshops = $item->user->workshops;

        $workshopItems = [];
        foreach ($workshops as $workshop) {
            $workshopItems[] = $workshop->name;
        }

        return [
            $item->user->name,
            $item->user->email . '|' . $item->user->phone,
            implode(',', $workshopItems),
            number_format($item->amount, 2),
            $item->created_at->format('d-m-Y'),
        ];
    }
}
