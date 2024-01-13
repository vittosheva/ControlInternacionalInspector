<?php

namespace App\Forms\Components;

use App\Models\Setting\ChartOfAccount;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccountSelect extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(__('Chart Of Account Number'))
            ->relationship('chartOfAccount', 'virtual_name', fn (Builder $query) => $query
                ->select([
                    ...ChartOfAccount::getModel()->getFillable(),
                    'id',
                ])
            )
            ->getOptionLabelFromRecordUsing(fn (Model $record) => $record->virtual_name ?? '')
            ->prefixIcon('heroicon-o-calculator')
            ->searchable(['account_number', 'account_name']);
    }
}
