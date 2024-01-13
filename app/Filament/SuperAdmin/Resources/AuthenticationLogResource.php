<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\AuthenticationLogResource\Pages\ListAuthenticationLogs;
use App\Models\LogChecks\AuthenticationLog;
use App\Tables\Filters\DateRangeFilter;
use Exception;
use Filament\Facades\Filament;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Tapp\FilamentAuthenticationLog\Resources\AuthenticationLogResource as BaseAuthenticationLogResource;

class AuthenticationLogResource extends BaseAuthenticationLogResource
{
    protected static ?string $model = AuthenticationLog::class;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('authenticatable');
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('id'),
                TextColumn::make('authenticatable')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.authenticatable'))
                    ->formatStateUsing(function (?string $state, Model $record) {
                        if (! $record->authenticatable_id) {
                            return new HtmlString('&mdash;');
                        }

                        return new HtmlString('<a href="'.route('filament.'.Filament::getCurrentPanel()->getId().'.resources.'.Str::plural((Str::lower(class_basename($record->authenticatable::class)))).'.edit', ['record' => $record->authenticatable_id]).'" class="inline-flex items-center justify-center hover:underline focus:outline-none focus:underline filament-tables-link text-primary-600 hover:text-primary-500 text-sm font-medium filament-tables-link-action">'.class_basename($record->authenticatable::class).'</a>');
                    })
                    ->sortable(),
                TextColumn::make('ip_address')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.ip_address'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('login_at')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.login_at'))
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('login_successful')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.login_successful'))
                    ->boolean()
                    ->sortable(),
                TextColumn::make('logout_at')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.logout_at'))
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('cleared_by_user')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.cleared_by_user'))
                    ->boolean()
                    ->sortable(),
                TextColumn::make('user_agent')
                    ->label(trans('filament-authentication-log::filament-authentication-log.column.user_agent'))
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) {
                            return null;
                        }

                        return $state;
                    }),
                //TextColumn::make('location'),
            ])
            ->actions([
                //
            ])
            ->filters([
                Filter::make('login_successful')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('login_successful', true)),
                DateRangeFilter::make('login_at')
                    ->label(__('Login At'))
                    ->from('login_at')
                    ->to('login_at')
                    ->columnSpan(2),
                Filter::make('cleared_by_user')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('cleared_by_user', true)),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuthenticationLogs::route('/'),
        ];
    }
}
