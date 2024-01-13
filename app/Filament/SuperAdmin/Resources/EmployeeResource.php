<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\EmployeeResource\Pages\CreateEmployee;
use App\Filament\SuperAdmin\Resources\EmployeeResource\Pages\EditEmployee;
use App\Filament\SuperAdmin\Resources\EmployeeResource\Pages\ListEmployees;
use App\Filament\SuperAdmin\Resources\EmployeeResource\Pages\ViewEmployee;
use App\Forms\Components\AddressTextarea;
use App\Forms\Components\BusinessNameTextInput;
use App\Forms\Components\CategorySelect;
use App\Forms\Components\ChartOfAccountSelect;
use App\Forms\Components\EmailTextInput;
use App\Forms\Components\GenderSelect;
use App\Forms\Components\IdentificationNumberTextInput;
use App\Forms\Components\IdentificationTypeSelect;
use App\Forms\Components\IsActiveToggle;
use App\Forms\Components\IsAllowedToLoginToggle;
use App\Forms\Components\NotesTextarea;
use App\Forms\Components\NumberFormatTextInput;
use App\Forms\Components\PersonaTypeSelect;
use App\Forms\Components\RoleSelect;
use App\Forms\Components\TelTextInput;
use App\Models\Persona\User;
use App\Models\Scopes\IsActiveScope;
use App\Models\Scopes\WithoutMainSubscribeUserScope;
use App\Packages\Filament\ActionsTrait;
use App\Packages\Filament\FilamentPartialsTrait;
use App\Tables\Actions\IsActiveBulkAction;
use App\Tables\Actions\IsAllowedToLoginBulkAction;
use App\Tables\Columns\CategoryColumn;
use App\Tables\Columns\CreatedAtColumn;
use App\Tables\Columns\CreatedByColumn;
use App\Tables\Columns\EmailColumn;
use App\Tables\Columns\IdentificationTypeColumn;
use App\Tables\Columns\NameColumn;
use App\Tables\Columns\NumberFormatColumn;
use App\Tables\Columns\PersonaTypeColumn;
use App\Tables\Grouping\IdentificationTypeGroup;
use App\Tables\Grouping\PersonaTypeGroup;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Exception;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Phpsa\FilamentPasswordReveal\Password;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class EmployeeResource extends Resource
{
    use ActionsTrait;
    use FilamentPartialsTrait;

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'lucide-user-check';

    protected static ?int $navigationSort = 1;

    protected static ?int $categoryTypeId = 10;

    public static function form(Form $form, bool $aside = true): Form
    {
        return $form
            ->schema([
                Section::make(__('Main Information'))
                    ->description(__('Important information about', ['name' => __('Employee')]))
                    ->icon(static::$navigationIcon)
                    ->aside($aside)
                    ->schema([
                        NumberFormatTextInput::make('user_id')
                            ->label(__('Employee No'))
                            ->prefix(User::getPrefixName())
                            ->columnSpan(3),
                        IdentificationNumberTextInput::make('identification_number')
                            ->model(static::getEloquentQuery()->getModel())
                            ->columnSpan(3),
                        IdentificationTypeSelect::make('identification_type')
                            ->columnSpan(3),
                        PersonaTypeSelect::make('persona_type')
                            ->columnSpan(3),
                        BusinessNameTextInput::make('name')
                            ->label(__('Name'))
                            ->columnSpan(9),
                        IsAllowedToLoginToggle::make('is_allowed_to_login')
                            ->inline(false)
                            ->columnSpan(2),
                        IsActiveToggle::make('is_active')
                            ->inline(false)
                            ->columnSpan(1),
                    ])
                    ->columns(12),

                Tabs::make('tabs')
                    ->id('employee')
                    ->tabs([
                        Tab::make('basic_info')
                            ->label(__('Basic Information'))
                            ->icon('heroicon-o-code-bracket-square')
                            ->schema([
                                Fieldset::make('')
                                    ->label(new HtmlString('<div class="flex space-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
<span>'.__('Personal Data').'</span></div>'))
                                    ->schema([
                                        TextInput::make('first_name')
                                            ->label(__('First Name'))
                                            ->maxLength(100)
                                            ->columnSpan(6),
                                        TextInput::make('last_name')
                                            ->label(__('Last Name'))
                                            ->maxLength(100)
                                            ->columnSpan(6),
                                        EmailTextInput::make('email')
                                            ->required()
                                            ->columnSpan(4),
                                        TelTextInput::make('telephone')
                                            ->columnSpan(4),
                                        GenderSelect::make('gender')
                                            ->columnSpan(4),
                                        AddressTextarea::make('address')
                                            ->columnSpan(7),
                                        Grid::make()
                                            ->schema([
                                                SelectTree::make('department_id')
                                                    ->label(__('Department'))
                                                    ->relationship('department', 'name', 'parent_id')
                                                    ->withCount()
                                                    ->searchable()
                                                    ->independent(false)
                                                    ->enableBranchNode(),
                                                CategorySelect::make('category_id')
                                                    ->categoryTypeId(static::$categoryTypeId),
                                            ])
                                            ->columns(1)
                                            ->columnSpan(5),
                                        Hidden::make('email_verified_at')
                                            ->default(now()),
                                    ])
                                    ->columns(12)
                                    ->columnSpan(9),
                                Fieldset::make('')
                                    ->label(new HtmlString('<div class="flex space-x-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
</svg><span>'.__('Credentials').'</span></div>'))
                                    ->schema([
                                        RoleSelect::make('roles')
                                            ->label(__('Role'))
                                            ->required(),
                                        Password::make('password'),
                                    ])
                                    ->columns(1)
                                    ->columnSpan(3),
                            ])
                            ->columns(12),
                        Tab::make('additional_info')
                            ->label(__('Additional Information'))
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                NotesTextarea::make('notes')
                                    ->columnSpan(6),
                                DatePicker::make('date_birth')
                                    ->label(__('Date Birth'))
                                    ->columnSpan(3),
                                DatePicker::make('date_hired')
                                    ->label(__('Date Hired'))
                                    ->columnSpan(3),
                                static::locationInformation(),
                            ])
                            ->columns(12),
                        Tab::make('accounting_info')
                            ->label(__('Accounting Information'))
                            ->icon('heroicon-o-calculator')
                            ->schema([
                                ChartOfAccountSelect::make('chart_of_account_number'),
                            ])
                            ->columns(4),
                    ])
                    ->persistTab()
                    ->columns(12)
                    ->columnSpanFull(),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                NumberFormatColumn::make('user_id')
                    ->label(__('Employee No'))
                    ->formatStateUsing(fn (string $state): string => idNumberFormat($state, User::getPrefixName(), true, '-')),
                NameColumn::make('name'),
                IdentificationTypeColumn::make('identification_type'),
                TextColumn::make('identification_number')
                    ->label(__('Identification Number'))
                    ->searchable()
                    ->toggleable(),
                PersonaTypeColumn::make('persona_type'),
                EmailColumn::make('email'),
                TextColumn::make('telephone')
                    ->label(__('Telephone'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('roles.name')
                    ->label(__('Role'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('department.name')
                    ->label(__('Department')),
                CategoryColumn::make('category.name'),
                //IsAllowedToLoginColumn::make('is_allowed_to_login'),
                //IsActiveColumn::make('is_active'),
                CreatedByColumn::make('creator.name'),
                CreatedAtColumn::make('created_at'),
            ])
            ->recordUrl(fn (Model $record) => EditEmployee::getUrl([$record->id]))
            ->filters([
                ...static::personaFilters(roles: true, trashed: false, categoryId: static::$categoryTypeId),
            ])
            ->actions([
                self::baseActions(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                BulkActionGroup::make([
                    ExportBulkAction::make(),
                    IsAllowedToLoginBulkAction::make('is_allowed_to_login'),
                    IsActiveBulkAction::make('is_active'),
                ]),
            ])
            ->groups([
                ...$table->getGroups(),
                IdentificationTypeGroup::make('identification_type'),
                PersonaTypeGroup::make('persona_type'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getEloquentQuery(): Builder
    {
        return User::query()
            ->withGlobalScope('no_main_subscribe_user', new WithoutMainSubscribeUserScope())
            ->withoutGlobalScopes([
                IsActiveScope::class,
            ])
            ->with('companyUser')
            ->join('company_user', 'company_user.user_id', '=', 'users.id')
            //->select(['users.*', 'company_user.*'])
            ->where('company_user.company_id', '=', filament()->getTenant()->getAttributeValue('id'));

        /*return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                IsActiveScope::class,
            ])
            ->withGlobalScope('no_main_subscribe_user', new WithoutMainSubscribeUserScope());*/
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmployees::route('/'),
            'create' => CreateEmployee::route('/create'),
            'view' => ViewEmployee::route('/{record}'),
            'edit' => EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Employee');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Employees');
    }
}
