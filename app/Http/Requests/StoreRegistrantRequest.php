<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrantRequest extends FormRequest
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
        if ($this->step == 1){
            return [
                'name' => 'required|string',
                'nisn' => 'nullable|numeric|min_digits:10|max_digits:10',
                'nik' => 'required|nullable|min_digits:16|max_digits:16'
            ];
        }
    }
}
