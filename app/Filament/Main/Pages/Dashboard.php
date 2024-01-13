<?php

namespace App\Filament\Main\Pages;

use App\Filament\Main\Widgets\CompanyWidget;
use Filament\Facades\Filament;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Panel;
use Filament\Support\Facades\FilamentIcon;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Route;
use Jenssegers\Date\Date;

class Dashboard extends BaseDashboard
{
    protected static string $routePath = '/';

    protected static ?int $navigationSort = -2;

    protected static string $view = 'filament-panels::pages.dashboard';

    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ??
            static::$title ??
            __('filament-panels::pages/dashboard.title');
    }

    public static function getNavigationIcon(): ?string
    {
        return static::$navigationIcon
            ?? FilamentIcon::resolve('panels::pages.dashboard.navigation-item')
            ?? (Filament::hasTopNavigation() ? 'heroicon-m-home' : 'heroicon-o-home');
    }

    public static function routes(Panel $panel): void
    {
        Route::get(static::getRoutePath(), static::class)
            ->middleware(static::getRouteMiddleware($panel))
            ->withoutMiddleware(static::getWithoutRouteMiddleware($panel))
            ->name(static::getSlug());
    }

    public static function getRoutePath(): string
    {
        return static::$routePath;
    }

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return Filament::getWidgets();
    }

    /**
     * @return array<class-string<Widget> | WidgetConfiguration>
     */
    public function getVisibleWidgets(): array
    {
        return $this->filterVisibleWidgets($this->getWidgets());
    }

    /**
     * @return int | string | array<string, int | string | null>
     */
    public function getColumns(): int|string|array
    {
        return 2;
    }

    public function getTitle(): string|Htmlable
    {
        return __(str(filament()->getCurrentPanel()->getPath())->ucfirst()->toString());
    }

    public function getHeading(): Htmlable|string
    {
        return greeting(); // __('Dashboard')
    }

    public function getSubheading(): Htmlable|string|null
    {
        return Date::now()->format('l, j F Y');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AccountWidget::class,
            CompanyWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            //
        ];
    }
}
