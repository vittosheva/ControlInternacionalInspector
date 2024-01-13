<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
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
        $document = DB::table('invoices')->find($this->optimus->decode($record), ['id', 'pdf']);

        if (
            empty($document) ||
            empty($document->pdf) ||
            ! Storage::disk('pdfs')->exists($document->pdf)
        ) {
            abort(Response::HTTP_NOT_FOUND, __('Error there is no document'));
        }

        return Storage::disk('pdfs')->response($document->pdf);
    }
}
