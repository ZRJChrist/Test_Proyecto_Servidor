<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Rules\PostalCode;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Todo Allow customers to make this request
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
            'customer' => ['required', 'exists:customers,id'],
            'operator' => ['required', 'different:1', 'exists:users,id'],
            'description' => ['required', 'max:255'],
            'name' => ['required'],
            'phone' => ['required',],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required', 'max:5', new PostalCode],
            'province' => ['required', 'exists:provinces,id'],
            'status' => ['required', 'exists:statuses,id'],
            'date' => ['required', 'date_format:Y-m-d', 'after:now'],
            'notes' => ['nullable', 'max:255'],
        ];
    }
}
