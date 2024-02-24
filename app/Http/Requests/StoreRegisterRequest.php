<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed|string',
            'password_confirmation' => 'required|string',
            'phone' => 'required|numeric|min_digits:13|max_digits:14'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Nama Lengkap',
            'email' => 'Alamat Email',
            'password' => 'Kata Sandi',
            'password_confirmation' => 'Ulangi Sandi',
            'phone' => 'Nomor Whatsapp'
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge(['role' => 4]);
    }
}
