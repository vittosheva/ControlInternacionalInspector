<?php

namespace App\Rules;

use Closure;
use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tavo\ValidadorEc;

class CedulaInSRI implements ValidationRule
{
    protected ValidadorEc $validatorEc;

    public function __construct()
    {
        $this->validatorEc = new ValidadorEc;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            // --------------------------------------------------------------- //
            // SRI Identification validations
            // --------------------------------------------------------------- //
            $sriRequest = $this->sriWebServiceCall($value);

            if (! empty($sriRequest->json()['identificacion'])) {
                return;
            }

            // --------------------------------------------------------------- //
            // LOCAL Identification validations
            // --------------------------------------------------------------- //
            if ($this->validatorEc->validarCedula($value)) {
                return;
            }

            $fail($this->validatorEc->getError());
        } catch (Exception $e) {
            Log::critical('SRI webservice error', [$e->getMessage()]);
        }
    }

    private function sriWebServiceCall($value): PromiseInterface|Response
    {
        return Http::get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Persona/obtenerPorTipoIdentificacion', [
            'numeroIdentificacion' => $value,
            'tipoIdentificacion' => 'C',
        ]);
    }
}
