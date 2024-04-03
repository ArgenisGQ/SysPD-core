<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'section',
        'course',
        'idcard',
        'name',
    ];
}
