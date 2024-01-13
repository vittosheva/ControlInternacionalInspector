<?php

namespace App\Forms\Components;

use App\Models\Setting\BranchOffice;
use App\Models\Setting\EmissionPoint;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BranchOfficeSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Branch Office'))
            ->rules([
                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                    if (! empty($value) && ! empty($get('code')) && DB::table(EmissionPoint::getModel()->getTable())
                        ->where('id', '<>', $get('id'))
                        ->where('branch_office_id', '=', $value)
                        ->where('code', '=', $get('code'))
                        ->where('is_active', '=', 1)
                        ->whereNull('deleted_at')
                        ->exists()
                    ) {
                        $fail(__('The establishment already has this emission point'));
                    }
                },
            ])
            ->relationship('branchOffice', 'virtual_name', fn (Builder $query) => $query
                ->select([
                    ...BranchOffice::getModel()->getFillable(),
                    'id',
                ])
            );
    }
}
