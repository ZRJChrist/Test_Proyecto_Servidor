<?php

namespace App\Http\Requests;

use App\Rules\Dni;
use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cif' => [new Dni],
            'name' => ['string', 'max:255', 'required'],
            'email' => ['email', 'max:255', 'required'],
            'phone' => ['numeric', 'required'],
            'account_number' => ['required', 'regex:pattern'],
            'country_id' => ['required', 'exists:countries,id']
        ];
    }
}
