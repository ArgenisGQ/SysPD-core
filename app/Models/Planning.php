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
        'section'
    ];

    //Relacion de uno a muchos
    public function plans()
    {
        return $this->hasMany(Plans::class);
    }
}
