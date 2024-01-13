<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Tavo\ValidadorEc;

class Ruc implements Rule
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
        // Validar RUC persona natural
        if ($this->validatorEc->validarRucPersonaNatural($value)) {
            return true;
        }

        // Validar RUC sociedad privada
        if ($this->validatorEc->validarRucSociedadPrivada($value)) {
            return true;
        }

        // Validar RUC sociedad pública
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
        return $this->errorMessage;
    }
}
