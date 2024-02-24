<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'nsm',
        'npsn',
        'ladder',
        'foundation',
        'address',
        'phone',
        'email',
        'website',
        'head',
    ];
}
