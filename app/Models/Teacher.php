<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'last_name',
        'identification',
        'email',
        'phone',
        'image',
        'state',
    ];
}
