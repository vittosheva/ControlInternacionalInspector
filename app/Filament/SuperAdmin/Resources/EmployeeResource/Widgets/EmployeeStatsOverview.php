<?php

namespace App\Filament\SuperAdmin\Resources\EmployeeResource\Widgets;

use App\Filament\SuperAdmin\Resources\EmployeeResource\Pages\ListEmployees;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;

class EmployeeStatsOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListEmployees::class;
    }

    protected function getStats(): array
    {
        $employees = $this
            ->getPageTableQuery()
            ->selectRaw('COUNT(*) AS total')
            ->selectRaw('IFNULL(SUM(`is_active` = 1 AND ISNULL(`deleted_at`)), 0) AS active')
            ->selectRaw('IFNULL(SUM(`is_active` = 0 AND ISNULL(`deleted_at`)), 0) AS inactive')
            ->selectRaw('IFNULL(SUM(!ISNULL(`deleted_at`)), 0) AS deleted')
            ->withTrashed()
            ->when(! auth()->user()->isAdmin(), function (Builder $builder) {
                $builder->where('created_at', '=', auth()->id());
            })
            ->first();

        return [
            Stat::make(__('Stat Active', ['stat' => __('Employees')]), $employees['active']),
            Stat::make(__('Stat Inactive', ['stat' => __('Employees')]), $employees['inactive']),
            Stat::make(__('Stat Deleted', ['stat' => __('Employees')]), $employees['deleted']),
            Stat::make(__('Stat Total', ['stat' => __('Employees')]), $employees['total']),
        ];
    }
}
