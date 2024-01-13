<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilamentAssets
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Send data to JS
            FilamentAsset::registerScriptData([
                'user' => [
                    'id' => auth()->user()->getAttributeValue('user_id'),
                    'name' => auth()->user()->getAttributeValue('name'),
                ],
                'company' => [
                    'ruc' => filament()->getTenant()->getAttributeValue('ruc'),
                    'name' => filament()->getTenant()->getAttributeValue('name'),
                ],
            ]);
        }

        return $next($request);
    }
}
