<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido',
        'comp_esp',
        'crit_desemp',
        'est_didac',
        'eval',
        'rec_apren',
        'biblio',
        'plans_id'
    ];

    //Relacion uno a muchos inverso
    public function plan(){
        return $this->belongsTo(Plans::class);
    }
}
