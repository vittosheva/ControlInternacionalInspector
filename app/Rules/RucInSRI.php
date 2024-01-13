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

class RucInSRI implements ValidationRule
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
            // PACKAGE: Identification validations
            // --------------------------------------------------------------- //
            if (! $this->validatorEc->validarRucPersonaNatural($value)) {
                if (! $this->validatorEc->validarRucSociedadPrivada($value)) {
                    if (! $this->validatorEc->validarRucSociedadPublica($value)) {
                        $fail($this->validatorEc->getError());
                    }
                }
            }

            $sriRequest = $this->sriWebServiceCall($value);

            if (! empty($sriRequest->json()['identificacion'])) {
                return;
            }

            $fail(__('El :attribute no es válido o está inactivo en el SRI.', ['attribute' => $attribute]));
        } catch (Exception $e) {
            Log::critical('SRI webservice error', [$e->getMessage()]);
        }
    }

    private function sriWebServiceCall($value): PromiseInterface|Response
    {
        return Http::get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/Persona/obtenerPorTipoIdentificacion', [
            'numeroIdentificacion' => $value,
            'tipoIdentificacion' => 'R',
        ]);
    }
}
