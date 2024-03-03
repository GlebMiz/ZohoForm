<?php

namespace App\Rules;

use App\Helpers\Stage;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class StageRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!in_array($value,Stage::all()))
            $fail('Stage is invalid');
    }
}
