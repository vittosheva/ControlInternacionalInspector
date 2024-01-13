<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Tavo\ValidadorEc;

class Cedula implements Rule
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
        if (! $this->validatorEc->validarCedula($value)) {
            $this->errorMessage = $this->validatorEc->getError();

            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return $this->errorMessage;
    }
}
