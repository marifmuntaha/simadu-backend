<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'nisn',
        'nik',
        'birthplace',
        'birthday',
        'gender',
        'statusonfamily',
        'placechild',
        'siblings',
        'phone',

        'major',
        'boarding',
        'program',

        'kk_number',
        'kk_head',

        'father_status',
        'father_name',
        'father_nik',
        'father_birthplace',
        'father_birthday',
        'father_job',
        'father_phone',

        'mother_status',
        'mother_name',
        'mother_nik',
        'mother_birthplace',
        'mother_birthday',
        'mother_job',
        'mother_phone',

        'guard_status',
        'guard_name',
        'guard_nik',
        'guard_birthplace',
        'guard_birthday',
        'guard_job',
        'guard_phone',
    ];
}
