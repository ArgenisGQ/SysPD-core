<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        /* 'curricularunit',
        'code',
        'section' */
    ];

    //Relacion uno a muchos inverso
    public function planning(){
        return $this->belongsTo(Planning::class);
    }

    //Relacion de uno a muchos
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
