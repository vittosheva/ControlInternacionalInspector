<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Inspections\ControlRecord;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Optimus\Optimus;
use Symfony\Component\HttpFoundation\Response;

class ViewController extends Controller
{
    public function __construct(protected Optimus $optimus)
    {
        //
    }

    /**
     * @throws Exception
     */
    public function handle($record)
    {
        $document = ControlRecord::query()->find($this->optimus->decode($record), ['id', 'inspection_report_pdf']);

        if (
            empty($document) ||
            empty($document->inspection_report_pdf) ||
            ! Storage::disk('inspections_pdf')->exists($document->inspection_report_pdf)
        ) {
            abort(Response::HTTP_NOT_FOUND, __('Error there is no document'));
        }

        return Storage::disk('inspections_pdf')->response($document->inspection_report_pdf);
    }
}
