<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Helpers\Zoho;


class AccountRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $zoho = new Zoho();
        $accounts = $zoho->getRecord('Accounts') ?: [];
        foreach ($accounts as $account)
            $array[] = $account['id'];
        if (!in_array($value, $array))
            $fail('Account is invalid');
    }
}
