<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HtmlMinifier
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $contentType = $response->headers->get('Content-Type');

        if (str_contains($contentType, 'text/html')) {
            $response->setContent($this->minify($response->getContent()));
        }

        return $response;
    }

    public function minify($input): array|string|null
    {
        $search = [
            '/\>\s+/',
            '/\s+</',
            '/\n([\S])/',
            '/\r/',
            '/\t/',
            //'/ +/',
            //'/> +</', // It breaks Alpine Tabs
            //'/\n/', // It breaks down entire application checking in console log
        ];

        $replace = [
            '> ',
            ' <',
            '$1',
            '',
            '',
            //' ',
            //'><', // It breaks Alpine Tabs
            //'', // It downs entire application checking in console log
        ];

        return preg_replace($search, $replace, $input);
    }
}
