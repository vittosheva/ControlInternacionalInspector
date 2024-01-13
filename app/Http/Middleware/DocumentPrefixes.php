<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class DocumentPrefixes
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (empty(getDocPrefixes())) {
            Cache::rememberForever('document_prefixes_'.filament()->getTenant()->getAttributeValue('ruc'), function () {
                $data = Filament::getTenant()->load('systemInformation:company_id,key,value');

                if (empty($data->systemInformation)) {
                    return [];
                }

                return collect($data->systemInformation)
                    ->filter(fn ($value, $key) => stripos($value['key'], 'prefix_') !== false)
                    ->mapWithKeys(fn ($value, $key) => [str_replace('prefix_', '', $value['key']) => $value['value']])
                    ->toArray();
            });
        }

        return $next($request);
    }
}
