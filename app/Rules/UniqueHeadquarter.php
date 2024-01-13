<?php

namespace App\Rules;

use App\Models\Setting\BranchOffice;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class UniqueHeadquarter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value == 1 && BranchOffice::where('headquarters', '=', 1)->exists()) {
            $fail(__('Only one establishment is allowed as a Headquarters'));
        }
    }
}
