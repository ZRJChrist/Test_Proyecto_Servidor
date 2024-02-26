<?php

namespace App\Http\Requests;

use App\Rules\Dni;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    private const REGEX_PHONE = '/^\+[1-9]{1,3}\d{9}$/';
    private const REGEX_ACCOUNT_NUMBER = '/[A-Z]{2}\d{2} ?\d{4} ?\d{4} ?\d{4} ?\d{4} ?[\d]{0,2}/';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return User::isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->path() === 'edit' ?
            [
                'cif' => ['required', new Dni],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255'],
                'phone' => ['required', 'regex:' . self::REGEX_PHONE],
                'account_number' => ['required', 'regex:' . self::REGEX_ACCOUNT_NUMBER],
                'country_id' => ['required', 'exists:countries,id']
            ] : [
                'active' => ['boolean'],
            ];
    }
}
