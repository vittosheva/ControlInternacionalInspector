<?php

namespace App\WebServices\Sri;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SriSubjectByIdentificationTypeWs
{
    public function __construct(public $client, public $identificationNumber)
    {
        //
    }

    public function run(): PromiseInterface|Response
    {
        return Http::sriBaseWebserviceWrapper()
            ->setClient($this->client)
            ->get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Persona/obtenerPorTipoIdentificacion', [
                'numeroIdentificacion' => $this->identificationNumber,
                'tipoIdentificacion' => 'R',
            ]);
    }
}
