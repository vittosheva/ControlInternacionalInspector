<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Widgets;

use App\Models\Persona\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;

class EmployeesWidget extends ChartWidget
{
    protected static ?string $pollingInterval = null;

    protected static ?string $maxHeight = '230px';

    public function getHeading(): string|Htmlable|null
    {
        return __('Employees');
    }

    public function getDescription(): string|Htmlable|null
    {
        return 'El número de empleados creados al mes por año.';
    }

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->dateAlias('period')
            ->dateColumn('created_at')
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('Employees'),
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill' => 'start',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
