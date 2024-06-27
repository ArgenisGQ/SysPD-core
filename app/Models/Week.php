<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'semana',
        'contenido',
        'comp_esp',
        'crit_desemp',
        'est_didac',
        'eval',
        'rec_apren',
        'biblio',
        'plans_id',
        'planning_id'
    ];

    //Relacion uno a muchos inverso
    /* public function plan(){
        return $this->belongsTo(Plans::class);
    } */

    //Relacion de uno a muchos
    public function plans(){
        return $this->hasMany(Plans::class);
    }

    //Relacion uno a muchos inverso
    public function planning(){
        return $this->belongsTo(Planning::class);
    }
}
