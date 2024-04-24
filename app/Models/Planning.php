<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = [
        'curricularunit',
        'code',
        'section',
        'period',
        'modalidad',
        'user_id',
        'course_id',
        'plan_id'
    ];

    //Relacion de uno a muchos
    public function plans(){
        return $this->hasMany(Plans::class);
    }

    //Relacion uno a muchos inverso
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos
    /* public function user(){
        return $this->hasMany(User::class);
    } */

    //Relacion uno a muchos inverso
    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
