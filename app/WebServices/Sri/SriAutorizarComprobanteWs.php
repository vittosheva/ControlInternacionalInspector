<?php

namespace App\WebServices\Sri;

use Exception;
use SoapClient;
use SoapFault;

class SriAutorizarComprobanteWs
{
    private SoapClient $client;

    /**
     * @throws SoapFault
     */
    public function __construct(public $wsdl, public $array = null)
    {
        $this->client = new SoapClient($wsdl, $array ?? [
            'soap_version' => config('dorsi.webservices_sri.soap_version'),
            'cache_wsdl' => config('dorsi.webservices_sri.cache'),
            'trace' => config('dorsi.webservices_sri.validar_comprobante.trace'),
            'exceptions' => config('dorsi.webservices_sri.exception'),
            'timeout' => config('dorsi.webservices_sri.timeout'),
            'user_agent' => 'PHP-SOAP/8.2.3',
        ]);
    }

    public function autorizacionComprobante(string $passwordAccess)
    {
        try {
            return $this->client->__soapCall('autorizacionComprobante', [
                'autorizacionComprobante' => [
                    'claveAccesoComprobante' => $passwordAccess,
                ],
            ]);
        } catch (SoapFault|Exception $e) {
            return $e->getMessage();
        }
    }
}
