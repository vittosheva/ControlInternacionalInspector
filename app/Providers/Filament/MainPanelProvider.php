<?php

namespace App\Providers\Filament;

use App\Filament\Main\Pages\Auth\Login;
use App\Filament\Main\Pages\Dashboard;
use App\Filament\Main\Resources\InspectionResource;
use App\Http\Middleware\HtmlMinifier;
use Awcodes\FilamentQuickCreate\QuickCreatePlugin;
use Exception;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use JulioMotol\AuthTimeout\Middlewares\CheckAuthTimeout;
use lockscreen\FilamentLockscreen\Http\Middleware\Locker;
use lockscreen\FilamentLockscreen\Lockscreen;

class MainPanelProvider extends PanelProvider
{
    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('main')
            ->domain(config('dorsi.project_url_homepage'))
            ->path('')
            ->default()
            ->login(Login::class)
            ->registration(null)
            ->emailVerification()
            ->passwordReset()
            ->profile(null)
            ->brandLogo(asset(config('dorsi.project_logo')))
            ->brandLogoHeight('3rem')
            ->favicon(asset(config('dorsi.project_favicon')))
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                CheckAuthTimeout::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                HtmlMinifier::class,
            ])
            ->authGuard('web')
            ->authMiddleware([
                Authenticate::class,
                Locker::class,
            ])
            ->spa(config('dorsi.filament.spa'))
            ->sidebarWidth('17rem')
            ->sidebarCollapsibleOnDesktop()
            //->sidebarFullyCollapsibleOnDesktop()
            ->collapsibleNavigationGroups()
            ->darkMode(false)
            ->maxContentWidth(MaxWidth::Full)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->renderHook(
                'panels::head.end',
                fn (): string => Blade::render('@vite(\'resources/css/app.css\')')
            )
            ->discoverResources(in: app_path('Filament/Main/Resources'), for: 'App\\Filament\\Main\\Resources')
            ->discoverPages(in: app_path('Filament/Main/Pages'), for: 'App\\Filament\\Main\\Pages')
            ->discoverWidgets(in: app_path('Filament/Main/Widgets'), for: 'App\\Filament\\Main\\Widgets')
            ->plugins([
                Lockscreen::make(),
                QuickCreatePlugin::make()
                    ->excludes([
                        //
                    ])
                    ->sortBy('navigation')
                    ->slideOver(),
            ])
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                //
            ])
            ->colors([
                'primary' => config('dorsi.filament.modules.colors.main'),
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling(null)
            ->navigationGroups([
                NavigationGroup::make()->label(__('Controls')),
                NavigationGroup::make()->label(__('Observation & Services')),
                NavigationGroup::make()->label(__('Variables')),
            ])
            ->navigationItems([
                NavigationItem::make(fn () => __('New Inspection'))
                    ->url(fn () => InspectionResource::getUrl('create'))
                    ->group(fn () => __('Controls'))
                    ->icon('heroicon-o-plus')
                    ->isActiveWhen(fn () => Route::current()->getName() === 'filament.main.resources.inspections.create')
                    ->visible(fn () => auth()->user()->can('create ControlRecord')),
                NavigationItem::make(fn () => __('Inspections'))
                    ->url(fn () => InspectionResource::getUrl())
                    ->group(fn () => __('Controls'))
                    ->icon('heroicon-o-magnifying-glass')
                    ->isActiveWhen(fn () => Route::current()->getName() === 'filament.main.resources.inspections.index')
                    ->visible(fn () => auth()->user()->can('view-any ControlRecord')),
            ]);
    }
}
