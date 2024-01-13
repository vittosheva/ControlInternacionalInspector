<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Inspections\ControlRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Jenssegers\Optimus\Optimus;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\PdfBuilder;
use Symfony\Component\HttpFoundation\Response;
use function Spatie\LaravelPdf\Support\pdf;

class GenerateController extends Controller
{
    public ?Model $document;

    public function __construct(protected Optimus $optimus)
    {
        //
    }

    public function handle($record): PdfBuilder
    {
        $id = $this->optimus->decode($record);

        $this->document = ControlRecord::query()
            ->with([
                'company',
                'station' => [
                    'location',
                ],
                'details' => [
                    'hose',
                    'measurement',
                    'measurement2',
                    'observation',
                    'observationCompany',
                ],
                'complementaryServices'
            ])
            ->find($id);

        //dd($this->document->complementaryServices);

        abort_if(
            empty($this->document) || empty($this->document->details),
            Response::HTTP_NOT_FOUND, __('Error there is no document')
        );

        $name = collect()
            ->push('inspeccion')
            ->push(Str::of($this->document->company->name)->slug()->toString())
            ->push(Str::of($this->document->station->name)->slug()->toString())
            ->push($this->document->inspection_date->format('d-m-Y'))
            ->implode('-');

        // Build Document
        return pdf()
            ->view('pdf.inspection', ['record' => $this->document])
            ->landscape()
            ->format(Format::A4)
            ->margins(6, 6, 6, 6)
            ->name($name.'.pdf');
    }
}
