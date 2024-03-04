<?php

namespace App\Http\Requests;

use App\Models\Country;
use App\Rules\Dni;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    private const REGEX_PHONE = '/^\+[1-9]{1,3}-\d{6,10}$/';
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
        $refererParts = explode('/', $this->header('referer'));
        $lastPart = end($refererParts);
        if ($lastPart === 'edit' || $lastPart === 'create') {
            $rules = [
                'cif' => ['required', new Dni],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255'],
                'account_number' => ['required', 'regex:' . self::REGEX_ACCOUNT_NUMBER],
                'country_id' => ['required', 'exists:countries,id']
            ];
            $result = Country::select('phone_code')
                ->where('id', '=', $this->request->get('country_id'))
                ->get();

            if ($result->isEmpty()) {
                $rules['phone'] = ['required'];
            } else {
                $numphone = $result->first();
                $this->request->set('phone', "+" . strval($numphone->phone_code) . '-' . $this->request->get('phone'));
                $rules['phone'] = ['required', 'regex:' . self::REGEX_PHONE];
            }
            return $rules;
        }
        return [
            'active' => ['boolean'],
        ];
    }
}
