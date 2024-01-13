<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Tavo\ValidadorEc;

class RucPersonaNatural implements Rule
{
    public string $errorMessage;

    protected ValidadorEc $validadorEc;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->validadorEc = new ValidadorEc;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        if (! $this->validadorEc->validarRucPersonaNatural($value)) {
            $this->errorMessage = $this->validadorEc->getError();

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
