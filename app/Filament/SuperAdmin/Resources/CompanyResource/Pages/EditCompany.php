<?php

namespace App\Filament\SuperAdmin\Resources\CompanyResource\Pages;

use App\Actions\Filament\CreateNewAction;
use App\Filament\SuperAdmin\Resources\CompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    public function getTitle(): string|Htmlable
    {
        if (filled(static::$title)) {
            return static::$title;
        }

        return __('filament-panels::resources/pages/edit-record.title', [
            'label' => $this->getRecord()->name ?? $this->getRecordTitle(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            CreateNewAction::make()->url(app(static::$resource)::getUrl('create')),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
