<?php

namespace App\WebServices\Sri;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SriEstablishmentInfoWs
{
    public function __construct(public $authorization, public $identificationNumber)
    {
        //
    }

    public function run(): PromiseInterface|Response
    {
        return Http::sriBaseWebserviceWrapper()
            ->withHeaders([
                'Authorization' => $this->authorization,
            ])
            ->get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Establecimiento/consultarPorNumeroRuc', [
                'numeroRuc' => $this->identificationNumber,
            ]);
    }
}
