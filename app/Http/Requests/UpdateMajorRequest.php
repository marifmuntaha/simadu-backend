<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMajorRequest extends FormRequest
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
            'alias' => 'required|string',
            'desc' => 'nullable',
            'boarding' => 'nullable',
            'program' => 'nullable'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'alias' => 'Singkatan',
            'desc' => 'Diskripsi',
            'boarding' => 'Boarding',
            'program' => 'Program Boarding'
        ];
    }
}
