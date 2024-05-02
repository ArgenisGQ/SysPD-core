<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan_unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'comp_esp',
        'crit_desemp',
        'plan_id'
    ];

    //Relacion uno a muchos inverso
    /* public function plan(){
        return $this->belongsTo(Planning::class);
    } */

    //Relacion de uno a muchos
    public function plans(){
        return $this->hasMany(Plans::class);
    }
}
