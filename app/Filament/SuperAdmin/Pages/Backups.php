<?php

namespace App\Filament\SuperAdmin\Pages;

use Filament\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;

class Backups extends BaseBackups
{
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static string $view = 'filament-spatie-backup::pages.backups';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('Maintenances');
    }

    protected function getActions(): array
    {
        return [
            Action::make('Create Backup')
                ->button()
                ->label(__('filament-spatie-backup::backup.pages.backups.actions.create_backup'))
                ->action('openOptionModal')
                ->modalWidth(MaxWidth::TwoExtraLarge)
                ->keyBindings(['F6']),
        ];
    }
}
