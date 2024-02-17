<?php

namespace App\Providers\Filament;

use App\Filament\SuperAdmin\Pages\Auth\Login;
use App\Filament\SuperAdmin\Pages\Backups;
use App\Filament\SuperAdmin\Pages\Dashboard;
use CmsMulti\FilamentClearCache\FilamentClearCachePlugin;
use Exception;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use JulioMotol\AuthTimeout\Middlewares\CheckAuthTimeout;
use lockscreen\FilamentLockscreen\Http\Middleware\Locker;
use lockscreen\FilamentLockscreen\Lockscreen;
use Moox\Jobs\JobsBatchesPlugin;
use Moox\Jobs\JobsFailedPlugin;
use Moox\Jobs\JobsPlugin;
use Moox\Jobs\JobsWaitingPlugin;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin;
use Tapp\FilamentAuthenticationLog\FilamentAuthenticationLogPlugin;

class SuperAdminPanelProvider extends PanelProvider
{
    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('superAdmin')
            ->domain(config('dorsi.project_url_admin'))
            ->path('')
            ->default(false)
            ->login(Login::class)
            ->registration(null)
            ->emailVerification(null)
            ->passwordReset(null)
            ->profile(null)
            ->brandLogo(asset(config('dorsi.project_logo')))
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
            ])
            ->authGuard('superAdmin')
            ->authMiddleware([
                Authenticate::class,
                Locker::class,
            ])
            ->plugins([
                Lockscreen::make(),
                FilamentClearCachePlugin::make(),
                JobsPlugin::make(),
                JobsWaitingPlugin::make(),
                JobsFailedPlugin::make(),
                JobsBatchesPlugin::make(),
                FilamentAuthenticationLogPlugin::make(),
                FilamentSpatieLaravelBackupPlugin::make()->usingPage(Backups::class),
            ])
            ->discoverResources(in: app_path('Filament/SuperAdmin/Resources'), for: 'App\\Filament\\SuperAdmin\\Resources')
            ->discoverPages(in: app_path('Filament/SuperAdmin/Pages'), for: 'App\\Filament\\SuperAdmin\\Pages')
            ->discoverWidgets(in: app_path('Filament/SuperAdmin/Widgets'), for: 'App\\Filament\\SuperAdmin\\Widgets')
            ->pages([
                Dashboard::class,
            ])
            ->colors([
                'primary' => Color::Blue,
            ])
            ->topNavigation(false)
            ->sidebarCollapsibleOnDesktop()
            ->darkMode()
            ->maxContentWidth(MaxWidth::Full)
            ->viteTheme('resources/css/filament/superadmin/theme.css')
            ->renderHook(
                'panels::head.end',
                fn (): string => Blade::render('@vite(\'resources/css/app.css\')')
            )
            ->navigationGroups([
                NavigationGroup::make(fn () => __('Access Management')),
                NavigationGroup::make(fn () => __('Job manager')),
                NavigationGroup::make(fn () => __('Securities')),
                NavigationGroup::make(fn () => __('Statistics')),
                NavigationGroup::make(fn () => __('Logs')),
                NavigationGroup::make(fn () => __('Maintenances')),
            ])
            ->navigationItems([
                //
            ]);
    }
}
