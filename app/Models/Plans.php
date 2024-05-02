<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'comp_esp',
        'crit_desemp',
        'est_eva', //es la actividad
        'inst_eva',
        'tip_eva',
        'evid_eva',
        'retro',
        'lapso',
        'ponderacion',
        'unit_id',
        'planning_id'
    ];

    //Relacion uno a muchos inverso
    public function planning(){
        return $this->belongsTo(Planning::class);
    }

    //Relacion de uno a muchos
    public function units(){
        return $this->hasMany(Units::class);
    }
}
