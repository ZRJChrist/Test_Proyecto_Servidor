<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Dni implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cif = strtoupper($value);

        if (!$this->isValidCIF($cif)) {
            $fail("This {$attribute} is Invalid");
        }
    }

    private function isValidCIF($cif)
    {
        $num = str_split($cif);

        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return false;
        }

        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1);
        }

        $sum = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2) {
            $sum += (int)substr((2 * $num[$i]), 0, 1) + (int)substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($sum, -1, 1);

        if (preg_match('/^[KLM]{1}/', $cif)) {
            return $num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1);
        }

        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
            return $num[8] == chr(64 + $n) || $num[8] == substr($n, -1, 1);
        }

        if (preg_match('/^[T]{1}/', $cif)) {
            return $num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif);
        }

        if (preg_match('/^[XYZ]{1}/', $cif)) {
            return $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(['X', 'Y', 'Z'], ['0', '1', '2'], $cif), 0, 8) % 23, 1);
        }

        return true;
    }
}
