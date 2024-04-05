<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synoptic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'purpose',
        'priority',
        'total_hours',
        't',
        'l_t',
        'i_sc_p',
        's',
        'a',
        'hde'
    ];
}
