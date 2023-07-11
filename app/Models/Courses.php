<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'section',
        'unit01',
        'unit02',
        'unit03',
        'unit04',
        'unit05',
        'unit06',
        'unit07',
        'unit08',
        'unit09',
        'unit10',
        'unit11',
        'unit12',
        'unit13',
        'unit14',
        'unit15',
        'unit16',
        'unitTotal',
        'id_dpto',
        'id_faculty',
        //'slug',
        //'color',
    ];

    //metodo para mostrar slug y no el id
    /* public function getRouteKeyName()
    {
        return "slug";
    } */

    //Relacion muchos a muchos

    /* public function activities(){
        return $this->belongsToMany(Activity::class);
    } */
}
