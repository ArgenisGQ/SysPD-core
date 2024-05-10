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
        /* 'comp_esp',
        'crit_desemp', */
        'est_eva', //es la actividad
        'inst_eva',
        'tip_eva',
        'evid_eva',
        'retro',
        'lapso',
        'ponderacion',
        'synoptic_id',
        'unit_id',
        'planning_id',
        'plan_units_id'
    ];

    //Relacion uno a muchos inverso
    public function planning(){
        return $this->belongsTo(Planning::class);
    }

    //Relacion de uno a muchos
    public function weeks(){
        return $this->hasMany(Week::class);
    }

    //Relacion uno a muchos inverso
    public function plan_unit(){
        return $this->belongsTo(Plan_unit::class);
    }
}
