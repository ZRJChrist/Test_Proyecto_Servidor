<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostalCode;

class TaskUpdateRequest extends FormRequest
{
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
        return [
            'title' => ['required', 'max:255'],
            'customer_id' => ['required', 'exists:customers,id'],
            'operator_id' => ['required', 'different:1', 'exists:users,id'],
            'description' => ['required', 'max:255'],
            'contact_name' => ['required'],
            'contact_phone' => ['required',],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required', 'max:5', new PostalCode],
            'province_id' => ['required', 'exists:provinces,id'],
            'status_id' => ['required', 'exists:statuses,id'],
            'scheduled_at' => ['required', 'date_format:Y-m-d', 'after:now'],
            'pre_notes' => ['nullable', 'max:255'],
        ];
    }
}
