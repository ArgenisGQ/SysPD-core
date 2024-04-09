<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = [
        /* 'curricularunit',
        'code',
        'section' */
    ];

    //Relacion uno a muchos inverso
    public function plan(){
        return $this->belongsTo(Plans::class);
    }
}
