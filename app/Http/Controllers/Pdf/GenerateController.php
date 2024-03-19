<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Inspections\BathroomComplianceObservation;
use App\Models\Inspections\ComplementaryService;
use App\Models\Inspections\ControlRecord;
use App\Models\Inspections\EnvironmentalObservation;
use App\Models\Inspections\InspectionSetting;
use App\Models\Inspections\Measurement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Optimus\Optimus;
use Spatie\LaravelPdf\Enums\Format;
use Symfony\Component\HttpFoundation\Response;

use function Spatie\LaravelPdf\Support\pdf;
use Barryvdh\DomPDF\Facade\Pdf as DomPdf;

class GenerateController extends Controller
{
    public ?Model $record;
    public string $renderMethod = 'domPdf'; // laravelPdf

    public function __construct(protected Optimus $optimus)
    {
        //
    }

    public function handle($record)
    {
        $this->record = ControlRecord::query()
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
                'creator:id,name,signature',
                'additionalInspector:id,name',
                'measurementTanks',
                'measurementDrawOuts',
            ])
            ->find($this->optimus->decode($record));

        abort_if(
            empty($this->record) || empty($this->record->details),
            Response::HTTP_NOT_FOUND,
            __('Error there is no document')
        );

        $this->record->details->map(function ($detail) {
            if (! empty($detail->measurements_array) && is_array($detail->measurements_array)) {
                $detail->measurements_array = Measurement::query()
                    ->whereIn('id', $detail->measurements_array)
                    //->orderBy('order_measurements')
                    ->pluck('name')
                    ->implode(', ');
            }
        });

        $data = [
            'record' => $this->record,
            'inspectionSettings' => InspectionSetting::query()->pluck('name', 'id')->all(),
            'badHoses' => 0,
            'complementaryServices' => ComplementaryService::all()->pluck('description', 'id')->all(),
            'environmentalObservations' => EnvironmentalObservation::all()->pluck('description', 'id')->all(),
            'bathroomComplianceObservations' => BathroomComplianceObservation::all()->pluck('description', 'id')->all(),
            'checkMark' => '✓',
            'wrongMark' => '-',
        ];

        $html = view('pdf.inspection', $data);

        if (request()->has('html')) {
            return $html;
        }

        $name = $this->getFileName().'.pdf';
        $renderMethod = $this->renderMethod;

        if ($renderMethod == 'domPdf') {
            $pdf = $this->domPdf($data, $name);
        } else if ($renderMethod == 'laravelPdf') {
            $pdf = $this->laravelPdf($data, $name);
        } else {
            abort(Response::HTTP_NOT_FOUND, __('Error there is no template'));
        }

        $this->record->inspection_report_pdf = $name;
        $this->record->save();

        if (request()->has('download')) {
            return $pdf->download($name);
        }

        if (request()->has('view')) {
            if ($renderMethod == 'domPdf') {
                return $pdf->stream($name);
            }
            
            return $pdf;
        }

        if ($renderMethod == 'domPdf') {
            Storage::disk('inspections_pdf')->put($name, $pdf->stream());
            return $pdf->stream($name);
        }

        return $pdf
            ->disk('inspections_pdf')
            ->save($name);
    }

    protected function domPdf($data, $name, $template = 'pdf.inspection')
    {
        return DomPdf::loadView($template, $data)
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->setOption([
                'dpi' => 150, 
                'defaultFont' => 'sans-serif',
            ]);
    }

    protected function laravelPdf($data, $name, $template = 'pdf.inspection')
    {
        return pdf()
            ->view($template, $data)
            ->name($name)
            ->landscape()
            ->format(Format::A4)
            ->margins(1, 3, 1, 3);
    }

    protected function getFileName(): string
    {
        return collect()
            ->push('inspeccion')
            ->push(Str::of($this->record->company->name)->slug()->toString())
            ->push(Str::of($this->record->station->name)->slug()->toString())
            ->push($this->record->inspection_date->format('d-m-Y'))
            ->implode('-');
    }
}
