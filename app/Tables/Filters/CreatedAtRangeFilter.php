<?php

namespace App\Tables\Filters;

use App\Forms\Components\IssueDateFlatpickr;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

class CreatedAtRangeFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->form([
                Fieldset::make(__('Created At'))
                    ->schema([
                        IssueDateFlatpickr::make('created_from')
                            ->label(__('From'))
                            ->placeholder(__('Pick a Date'))
                            ->default(null),
                        IssueDateFlatpickr::make('created_until')
                            ->label(__('Until'))
                            ->placeholder(__('Pick a Date'))
                            ->default(null),
                    ])
                    ->columns(),
            ])
            ->indicateUsing(function (array $data): array {
                Date::setLocale(config('app.locale'));

                $indicators = [];

                if (filled($data['created_from'])) {
                    $date = Date::parse($data['created_from']);
                    $indicators['created_from'] = __('Created From: ', ['date' => $date->format('Y-m-d')]);
                }

                if (filled($data['created_until'])) {
                    $date = Carbon::parse($data['created_until']);
                    $indicators['created_until'] = __('Created Until: ', ['date' => $date->format('Y-m-d')]);
                }

                return $indicators;
            })
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        filled($data['created_from']),
                        fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $data['created_from']),
                    )
                    ->when(
                        filled($data['created_until']),
                        fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $data['created_until']),
                    );
            });
    }
}
