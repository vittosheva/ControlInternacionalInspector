<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\InspectionSetting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\HtmlString;
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

    public function handle($record)
    {
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
                'complementaryServices',
                'environmentalObservations',
                'bathroomComplianceObservations',
            ])
            ->find($this->optimus->decode($record));

        abort_if(
            empty($this->document) || empty($this->document->details),
            Response::HTTP_NOT_FOUND, __('Error there is no document')
        );

        $data = [
            'record' => $this->document,
            'inspectionSettings' => InspectionSetting::query()->pluck('name', 'id')->all(),
        ];

        if (request()->has('html')) {
            return view('pdf.inspection', $data);
        }

        $name = $this->getFileName();

        $pdf = pdf()
            ->view('pdf.inspection', $data)
            ->name($name.'.pdf')
            ->landscape()
            ->format(Format::A4)
            ->margins(6, 6, 6, 6);

        $this->document->inspection_report_pdf = $name.'.pdf';
        $this->document->save();

        if (request()->has('download')) {
            return $pdf->download($name);
        }

        if (request()->has('view')) {
            return $pdf;
        }

        return $pdf
            ->disk('inspections_pdf')
            ->save($name.'.pdf');
    }

    protected function getFileName(): string
    {
        return collect()
            ->push('inspeccion')
            ->push(Str::of($this->document->company->name)->slug()->toString())
            ->push(Str::of($this->document->station->name)->slug()->toString())
            ->push($this->document->inspection_date->format('d-m-Y'))
            ->implode('-');
    }
}
