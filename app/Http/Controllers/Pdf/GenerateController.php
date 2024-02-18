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
use Illuminate\Support\Str;
use Jenssegers\Optimus\Optimus;
use Spatie\LaravelPdf\Enums\Format;
use Symfony\Component\HttpFoundation\Response;

use function Spatie\LaravelPdf\Support\pdf;

class GenerateController extends Controller
{
    public ?Model $record;

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
            Response::HTTP_NOT_FOUND, __('Error there is no document')
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

        if (request()->has('html')) {
            return view('pdf.inspection', $data);
        }

        $name = $this->getFileName();

        $pdf = pdf()
            ->view('pdf.inspection', $data)
            ->name($name.'.pdf')
            ->landscape()
            ->format(Format::A4)
            ->margins(1, 3, 1, 3);

        $this->record->inspection_report_pdf = $name.'.pdf';
        $this->record->save();

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
            ->push(Str::of($this->record->company->name)->slug()->toString())
            ->push(Str::of($this->record->station->name)->slug()->toString())
            ->push($this->record->inspection_date->format('d-m-Y'))
            ->implode('-');
    }
}
