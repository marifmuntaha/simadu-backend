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
        'program'
    ];
}
