<?php

namespace App\Providers;

use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use Phpsa\FilamentPasswordReveal\Password;

class FilamentConfigureUsingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // COMPONENTS
        Table::configureUsing(function (Table $table): void {
            $table
                ->striped()
                ->deferLoading(config('dorsi.filament.defer_loading'))
                ->filtersFormColumns(6)
                ->filtersLayout(FiltersLayout::AboveContentCollapsible)
                ->actionsPosition(ActionsPosition::BeforeColumns)
                ->selectCurrentPageOnly()
                ->searchOnBlur()
                ->searchDebounce('500ms')
                ->paginationPageOptions(config('dorsi.filament.options'))
                ->defaultPaginationPageOption(config('dorsi.filament.default_option'))
                ->persistSortInSession(config('dorsi.filament.persists.sort'))
                ->persistSearchInSession(config('dorsi.filament.persists.search'))
                ->persistFiltersInSession(config('dorsi.filament.persists.filter'))
                ->persistColumnSearchesInSession(config('dorsi.filament.persists.column_search'));
        });

        Section::configureUsing(function (Section $section): void {
            $section->compact();
        });

        Fieldset::configureUsing(function (Fieldset $fieldset): void {
            $fieldset->extraAttributes([
                'class' => '!p-4',
            ]);
        });

        Tabs::configureUsing(function (Tabs $tabs): void {
            $tabs->persistTabInQueryString();
        });

        // FORMS
        TextInput::configureUsing(function (TextInput $textInput): void {
            $textInput
                //->live(onBlur: true)
                ->autocomplete(false);
        });

        Select::configureUsing(function (Select $select): void {
            $select
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Component $livewire, Select $component) => $livewire->validateOnly($component->getStatePath()))
                ->preload()
                ->searchable()
                ->searchDebounce(500)
                ->optionsLimit(50) // 25
                ->hintActions([
                    Action::make('remove_all')
                        ->label(__('Remove All'))
                        ->action(fn (Select $component) => $component->state([]))
                        ->visible(fn (Select $component) => is_array($component->getState()) && count($component->getState()) > 0),
                    /*Action::make('select_all')
                        ->label(__('Select All'))
                        ->action(fn (Select $component) => $component->state(array_keys($component->getOptions())))
                        ->visible(fn (Select $component) => is_array($component->getState()) && count($component->getState()) <= 0)
                        ->hidden(fn (Select $component) => ! $component->isMultiple() || ! $component->isPreloaded()),*/
                ])
                ->native(false);
        });

        Toggle::configureUsing(function (Toggle $toggle): void {
            $toggle->reactive();
        });

        // ACTIONS
        ActionGroup::configureUsing(function (ActionGroup $actionGroup): void {
            $actionGroup
                ->tooltip(__('Actions'))
                ->size(ActionSize::ExtraSmall)
                ->defaultSize(ActionSize::ExtraSmall)
                ->dropdownPlacement('right');
        });

        Action::configureUsing(function (Action $action): void {
            $action
                ->size(ActionSize::ExtraSmall)
                ->closeModalByClickingAway(false)
                ->defaultSize(ActionSize::ExtraSmall);
        });

        CreateAction::configureUsing(function (CreateAction $createAction): void {
            $createAction->keyBindings(['F6']);
        });

        // CUSTOMS
        Flatpickr::configureUsing(function (Flatpickr $flatpickr): void {
            $flatpickr
                ->autocomplete(false)
                ->prefixIcon('heroicon-o-calendar-days')
                ->altFormat('d-m-Y')
                ->dateFormat('Y-m-d')
                ->default(now()->format('Y-m-d'));
        });

        DateRangeFilter::configureUsing(function (DateRangeFilter $dateRangeFilter): void {
            $dateRangeFilter
                ->label(__('Created At'))
                ->maxDate(now())
                ->withIndicator();
        });

        Password::configureUsing(function (Password $passwordField): void {
            $passwordField
                ->label(__('Password'))
                ->password()
                ->maxLength(255)
                ->prefixIcon('heroicon-o-lock-closed')
                ->autocomplete('new-password')
                ->copyable(false)
                ->revealable(fn ($livewire) => ! auth()->check() || $livewire instanceof CreateRecord || $livewire instanceof EditRecord)
                ->generatable(fn ($livewire) => ! auth()->check() || $livewire instanceof CreateRecord || $livewire instanceof EditRecord)
                ->passwordLength(config('dorsi.passwords.min_length'))
                ->rules([
                    PasswordRule::defaults(),
                ])
                ->default(fn (Component $livewire) => $livewire instanceof CreateRecord || $livewire instanceof EditRecord ? Str::password(config('dorsi.passwords.min_length')) : null)
                ->dehydrated(fn ($state): bool => filled($state))
                ->required(fn ($livewire) => $livewire instanceof CreateRecord);
        });
    }
}
