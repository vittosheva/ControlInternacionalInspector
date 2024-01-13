<?php

namespace App\Filament\Main\Widgets;

use Filament\Widgets\Widget;

class CompanyWidget extends Widget
{
    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected static bool $isDiscovered = false;

    protected static string $view = 'filament.main.widgets.company-widget';

    protected int|string|array $columnSpan = 1;

    public static function canView(): bool
    {
        return filament()->hasTenancy();
    }
}
