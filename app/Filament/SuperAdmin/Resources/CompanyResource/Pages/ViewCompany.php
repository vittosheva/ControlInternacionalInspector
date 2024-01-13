<?php

namespace App\Filament\SuperAdmin\Resources\CompanyResource\Pages;

use App\Filament\SuperAdmin\Resources\CompanyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewCompany extends ViewRecord
{
    protected static string $resource = CompanyResource::class;

    public function getTitle(): string|Htmlable
    {
        if (filled(static::$title)) {
            return static::$title;
        }

        return __('filament-panels::resources/pages/view-record.title', [
            'label' => $this->getRecord()->name ?? $this->getRecordTitle(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
