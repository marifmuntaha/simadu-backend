<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegistrantRequest extends FormRequest
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
        if ($this->step == 1) {
            $rules = [
                'name' => 'required|string',
                'nisn' => 'nullable|numeric|min_digits:10|max_digits:10',
                'nik' => 'required|nullable|min_digits:16|max_digits:16',
                'gender' => 'required',
                'birthplace' => 'required|string',
                'birthday' => 'date',
                'statusonfamily' => 'required',
                'placechild' => 'required',
                'siblings' => 'required',
                'phone' => "required|numeric|min_digits:13|max_digits:15"
            ];
        } elseif ($this->step == 2) {
            $rules = [
                'major' => 'required',
                'boarding' => 'required',
                'program' => 'nullable'
            ];
        } elseif ($this->step == 3) {
            $rules_basic = [
                'kk_number' => 'required|string|min_digits:16|max_digits:16',
                'kk_head' => 'required|string',
                'father_status' => 'required|string',
                'father_name' => 'required|string',
                'father_phone' => 'nullable|min_digits:13|max_digits:15',
                'mother_status' => 'required|string',
                'mother_name' => 'required|string',
                'mother_phone' => 'nullable|min_digits:13|max_digits:15',
                'guard_status' => 'required|string',
                'guard_name' => 'required|string',
                'guard_phone' => 'nullable|min_digits:13|max_digits:15',
            ];
            $rules_father = $this->father_status === 1 ?
                [
                    'father_nik' => 'required|min_digits:16|max_digits:16|string',
                    'father_birthplace' => 'required|string',
                    'father_birthday' => 'required|date',
                    'father_job' => 'required',
                ] : [
                    'father_nik' => 'nullable|min_digits:16|max_digits:16|string',
                    'father_birthplace' => 'nullable|string',
                    'father_birthday' => 'nullable|date',
                    'father_job' => 'nullable',
                ];
            $rules_mother = $this->mother_status === 1 ?
                [
                    'mother_nik' => 'required|min_digits:16|max_digits:16|string',
                    'mother_birthplace' => 'required|string',
                    'mother_birthday' => 'required|date',
                    'mother_job' => 'required',
                ] : [
                    'mother_nik' => 'nullable|min_digits:16|max_digits:16|string',
                    'mother_birthplace' => 'nullable|string',
                    'mother_birthday' => 'nullable|date',
                    'mother_job' => 'nullable',
                ];
            $rules_guard = $this->guard_status === 1 ?
                [
                    'guard_nik' => 'required|min_digits:16|max_digits:16|string',
                    'guard_birthplace' => 'required|string',
                    'guard_birthday' => 'required|date',
                    'guard_job' => 'required',
                ] : [
                    'guard_nik' => 'nullable|min_digits:16|max_digits:16|string',
                    'guard_birthplace' => 'nullable|string',
                    'guard_birthday' => 'nullable|date',
                    'guard_job' => 'nullable',
                ];
            $rules = array_merge($rules_basic, $rules_father, $rules_mother, $rules_guard);

        } else {
            $rules = [];
        }

        return $rules;
    }

    public
    function attributes(): array
    {
        return [
            'name' => 'Nama Lengkap',
            'nisn' => 'NISN',
            'nik' => 'NIK',
            'gender' => 'Jenis Kelamin',
            'birthplace' => 'Tempat Lahir',
            'birthday' => 'Tanggal Lahir',
            'statusonfamily' => 'Status dalam Keluarga',
            'placechild' => 'Anak Ke-',
            'siblings' => 'Jumlah Saudara',
            'phone' => "Nomor Whatsapp",
            'major' => 'Program Madrasah',
            'boarding' => 'Boarding/Mondok',
            'program' => 'Program Boarding',
            'kk_number' => 'Nomor Kartu Keluarga',
            'kk_head' => 'Nama Kepala Keluarga',

            'father_status' => 'Status Ayah',
            'father_name' => 'Nama Ayah',
            'father_nik' => 'NIK Ayah',
            'father_birthplace' => 'Tempat Lahir Ayah',
            'father_birthday' => 'Tanggal Lahir Ayah',
            'father_job' => 'Perkerjaan Ayah',
            'father_phone' => 'Nomor Whatsapp Ayah',

            'mother_status' => 'Status Ibu',
            'mother_name' => 'Nama Ibu',
            'mother_nik' => 'NIK Ibu',
            'mother_birthplace' => 'Tempat Lahir Ibu',
            'mother_birthday' => 'Tanggal Lahir Ibu',
            'mother_job' => 'Perkerjaan Ibu',
            'mother_phone' => 'Nomor Whatsapp Ibu',

            'guard_status' => 'Status Wali',
            'guard_name' => 'Nama Wali',
            'guard_nik' => 'NIK Wali',
            'guard_birthplace' => 'Tempat Lahir Wali',
            'guard_birthday' => 'Tanggal Lahir Wali',
            'guard_job' => 'Perkerjaan Wali',
            'guard_phone' => 'Nomor Whatsapp Wali',
        ];
    }
}
