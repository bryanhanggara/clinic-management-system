<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialist',
        'phone',
        'email',
        'photo',
        'address',
        'sip'
    ];
        
}
