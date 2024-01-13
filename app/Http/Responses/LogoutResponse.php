<?php

namespace App\Http\Responses;

use Filament\Exceptions\NoDefaultPanelSetException;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Http\Request;
use Livewire\Features\SupportRedirects\Redirector;
use Symfony\Component\HttpFoundation\Response;

class LogoutResponse implements LogoutResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     *
     * @throws NoDefaultPanelSetException
     */
    public function toResponse($request): Response|Redirector
    {
        return redirect()->intended(filament()->getDefaultPanel()->getLoginUrl());
    }
}
