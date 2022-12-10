<?php

namespace App\Http\Controllers\Exports;

use App\Traliant\Helpers\FileUtils;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

abstract class BuilderCsvExport
{
    const DB_CHUNK_SIZE = 500;

    protected string $displayDateFormat;

    public function __construct()
    {
        $this->displayDateFormat = 'Y-m-d';
    }

    abstract protected function getHeader(mixed $item = null): array;

    abstract protected function getRow(mixed $item): array;

    protected function sendCsvResponse(Builder $query, string $fileName = null): StreamedResponse
    {
        $fileName = $fileName ?? $this->getFileName();

        return new StreamedResponse(function () use ($query) {
            $handle = fopen('php://output', 'w');

            $index = 0;
            $query->chunk(static::DB_CHUNK_SIZE, function ($items) use ($handle, $index) {
                foreach ($items as $item) {
                    if ($index === 0) {
                        fputcsv($handle, $this->getHeader($item)); // Add CSV headers
                    }

                    $rowData = $this->getRow($item);

                    fputcsv($handle, $rowData);

                    $index++;
                }
            });

            // Close the output stream
            fclose($handle);
        }, Response::HTTP_OK, $this->getHttpHeaders($fileName));
    }

    protected function getFileName(string $prefix = 'export'): string
    {
        $fileName = Str::of($prefix)->snake();

        return $fileName->append('-')
            ->append(Carbon::now()->format('Y-m-d'))
            ->append('.csv');
    }

    private function getHttpHeaders(string $fileName = 'export.csv'): array
    {
        return [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
    }
}
