<?php

namespace App\WebServices\Sri;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SriCedulaWs
{
    public function __construct(public $numeroIdentificacion)
    {
        //
    }

    public function run(): PromiseInterface|Response
    {
        return Http::sriBaseWebserviceWrapper()
            ->get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Persona/obtenerPorTipoIdentificacion', [
                'numeroIdentificacion' => $this->numeroIdentificacion,
                'tipoIdentificacion' => 'C',
            ]);
    }
}
