<?php

namespace App\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tavo\ValidadorEc;

class RucExistsInSRI implements Rule
{
    public string $errorMessage;

    protected ValidadorEc $validatorEc;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->validatorEc = new ValidadorEc;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        $value = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $value);

        if (strlen($value) !== 13) {
            $this->errorMessage = 'Ruc no contiene los dígitos necesarios';

            return false;
        }

        // --------------------------------------------------------------- //
        // SRI Identification validations
        // --------------------------------------------------------------- //
        try {
            $sriRequest = Http::get('https://srienlinea.sri.gob.ec/sri-catastro-sujeto-servicio-internet/rest/ConsolidadoContribuyente/existePorNumeroRuc', [
                'numeroRuc' => $value,
            ]);

            if (! empty($sriRequest->json())) {
                return true;
            }

            $this->errorMessage = 'Ruc no existe en el SRI';

            return false;
        } catch (Exception $e) {
            Log::critical('SRI webservice error', [$e->getMessage()]);
        }

        // --------------------------------------------------------------- //
        // LOCAL Identification validations
        // --------------------------------------------------------------- //

        if ($this->validatorEc->validarRucPersonaNatural($value)) {
            return true;
        }

        if ($this->validatorEc->validarRucSociedadPrivada($value)) {
            return true;
        }

        if ($this->validatorEc->validarRucSociedadPublica($value)) {
            return true;
        }

        $this->errorMessage = $this->validatorEc->getError();

        return false;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return (string) __($this->errorMessage);
    }
}
