<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Exceptions\NoDefaultPanelSetException;
use Illuminate\Http\Request;
use Laravel\Octane\Exceptions\DdException;
use Symfony\Component\HttpFoundation\Response;

class MustTwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     *
     * @throws NoDefaultPanelSetException
     * @throws DdException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            ! filament()->auth()->check() &&
            filament()->getCurrentPanel()->getId() !== filament()->getDefaultPanel()->getId()
        ) {
            return redirect()->route('filament.'.filament()->getDefaultPanel()->getId().'.auth.two-factor', ['tenant' => request()->route()->parameter('tenant'), 'next' => request()->getRequestUri()]);
        }

        if (
            filament()->auth()->check() &&
            ! str($request->route()->getName())->contains('logout')
        ) {
            $breezy = filament('filament-breezy');
            $myProfileRouteName = 'filament.'.filament()->getDefaultPanel()->getId().'.pages.my-profile';
            $myProfileRouteParameters = [];

            if (filament()->hasTenancy()) {
                if (! $tenantId = request()->route()->parameter('tenant')) {
                    return $next($request);
                }

                $myProfileRouteParameters = ['tenant' => $tenantId];

                $twoFactorRoute = route('filament.'.filament()->getDefaultPanel()->getId().'.auth.two-factor', ['tenant' => $tenantId, 'next' => request()->getRequestUri()]);
            } else {
                $twoFactorRoute = route('filament.'.filament()->getCurrentPanel()->getId().'.auth.two-factor', ['next' => request()->getRequestUri()]);
            }

            if (method_exists($breezy, 'shouldForceTwoFactor') && $breezy->shouldForceTwoFactor() && ! $request->routeIs($myProfileRouteName)) {
                if (filament()->getCurrentPanel()->getId() === 'superAdmin') {
                    return $next($request);
                }

                return redirect()->route($myProfileRouteName, $myProfileRouteParameters);
            } elseif (filament()->auth()->user()->hasConfirmedTwoFactor() && ! filament()->auth()->user()->hasValidTwoFactorSession()) {
                return redirect($twoFactorRoute);
            }
        }

        return $next($request);
    }
}
