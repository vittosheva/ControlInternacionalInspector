<?php

namespace App\Packages\Filament;

use App\Forms\Components\CitySelect;
use App\Forms\Components\CountrySelect;
use App\Forms\Components\StateSelect;
use App\Tables\Filters\CategoryFilter;
use App\Tables\Filters\EmployeeFilter;
use App\Tables\Filters\IdentificationTypeFilter;
use App\Tables\Filters\IsActiveFilter;
use App\Tables\Filters\IsAllowedToLoginFilter;
use App\Tables\Filters\RoleFilter;
use Exception;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

trait FilamentPartialsTrait
{
    public static function locationInformation(bool $country = true, bool $state = true, bool $city = true, bool $parish = true): Fieldset
    {
        return Fieldset::make(fn () => __('Location'))
            ->extraAttributes(['class' => '!p-4'])
            ->schema([
                CountrySelect::make('country_id')
                    ->default(64)
                    ->visible($country)
                    ->required(),
                StateSelect::make('state_id')
                    ->visible($state),
                CitySelect::make('city_id')
                    ->visible($city),
                TextInput::make('parish')
                    ->label(__('Parish'))
                    ->maxLength(100)
                    ->visible($parish),
            ])
            ->columns(collect([$country, $state, $city, $parish])->filter()->count());
    }

    /**
     * @throws Exception
     */
    public static function personaFilters(bool $roles = false, bool $created = true, bool $trashed = true, bool $salesperson = false, $categoryId = null): array
    {
        return collect([
            CategoryFilter::make('category_id')
                ->relationship('category', 'name', fn (Builder $query) => $query
                    ->select(['id', 'name'])
                    ->where('category_type_id', '=', $categoryId)
                ),
            IdentificationTypeFilter::make('identification_type'),
            IsActiveFilter::make('is_active'),
            IsAllowedToLoginFilter::make('is_allowed_to_login'),
        ])
            ->when($salesperson, fn (Collection $value) => $value->push(EmployeeFilter::make('salesperson_id'))) // @phpstan-ignore-line
            ->when($trashed, fn (Collection $value) => $value->push(TrashedFilter::make())) // @phpstan-ignore-line
            ->when($created, fn (Collection $value) => $value->push(DateRangeFilter::make('created_at'))) // @phpstan-ignore-line
            ->when($roles, fn (Collection $value) => $value->prepend(RoleFilter::make('role_id'))) // @phpstan-ignore-line
            ->toArray();
    }
}
