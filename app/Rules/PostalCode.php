<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\DataAwareRule;


class PostalCode implements ValidationRule, DataAwareRule
{
    protected $data = [];

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = intval($value);
        $value = $value < 10000 ? substr(strval($value), 0, 1) : substr(strval($value), 0, 2);
        if ($value !== $this->data['province_id']) {
            $fail("Province and Postal Code must be coincident");
        }
    }
}
