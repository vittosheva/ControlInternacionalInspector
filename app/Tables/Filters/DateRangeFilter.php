<?php

namespace App\Tables\Filters;

use App\Forms\Components\IssueDateFlatpickr;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;

class DateRangeFilter extends SelectFilter
{
    public ?string $from = null;

    public ?string $to = null;

    public function from(?string $from): static
    {
        $this->from = $from;

        return $this;
    }

    public function to(?string $to): static
    {
        $this->to = $to;

        return $this;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->form([
                Fieldset::make(fn () => __($this->getLabel()))
                    ->schema(function () {
                        $form = [];

                        if (filled($this->from)) {
                            $form[] = IssueDateFlatpickr::make($this->from.'_from')
                                ->label(__('From'))
                                ->placeholder(__('Pick a Date'))
                                ->default(null);
                        }

                        if (filled($this->to)) {
                            $form[] = IssueDateFlatpickr::make($this->to.'_to')
                                ->label(__('Until'))
                                ->placeholder(__('Pick a Date'))
                                ->default(null);
                        }

                        return $form;
                    })
                    ->columns(),
            ])
            ->indicateUsing(function (array $data): array {
                Date::setLocale(config('app.locale'));

                $indicators = [];

                if (filled($data[$this->from.'_from'])) {
                    $date = Date::parse($data[$this->from.'_from']);
                    $indicators[__('From')] = __('Date From: ', ['date' => $date->format('Y-m-d')]);
                }

                if (filled($data[$this->to.'_to'])) {
                    $date = Carbon::parse($data[$this->to.'_to']);
                    $indicators[__('Until')] = __('Date To: ', ['date' => $date->format('Y-m-d')]);
                }

                return $indicators;
            })
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        filled($data[$this->from.'_from']),
                        fn (Builder $query, $date): Builder => $query->whereDate($this->from, '>=', $data[$this->from.'_from']),
                    )
                    ->when(
                        filled($data[$this->to.'_to']),
                        fn (Builder $query, $date): Builder => $query->whereDate($this->to, '<=', $data[$this->to.'_to']),
                    );
            });
    }
}
