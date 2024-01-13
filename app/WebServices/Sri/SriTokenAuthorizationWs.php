<?php

namespace App\WebServices\Sri;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SriTokenAuthorizationWs
{
    public function __construct(public $client, public $token)
    {
        //
    }

    public function run(): PromiseInterface|Response
    {
        return Http::sriBaseWebserviceWrapper()
            ->setClient($this->client)
            ->get('https://srienlinea.sri.gob.ec/sri-captcha-servicio-internet/rest/ValidacionCaptcha/validarCaptcha/'.$this->token, [
                'emitirToken' => true,
            ]);
    }
}
