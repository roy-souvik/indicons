<?php

namespace App\Http\Controllers\Exports;

use App\Models\ConferenceAbstract;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class AbstractExport extends BuilderCsvExport
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export(): StreamedResponse
    {
        $query = ConferenceAbstract::with(['user'])->orderBy('id', 'desc');

        $fileName = $this->getFileName('abstracts');

        return $this->sendCsvResponse($query, $fileName);
    }

    protected function getHeader($item = null): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Heading',
            'Theme',
            'Created Date',
            'Confirmed',
        ];
    }

    protected function getRow($item): array
    {
        return [
            $item->abstract_id,
            $item->user->name,
            $item->user->email,
            $item->heading,
            ucfirst($item->theme),
            $item->created_at->format('d-m-Y'),
            $item->confirmed ? 'Yes' : 'No',
        ];
    }
}
