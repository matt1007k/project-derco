<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'nombre','alta','media','baja','muy_positivo','positivo','negativo','muy_negativo','valor'
    ];


    public function force(){
        return $this->belongsTo('App\Force');
    }

    public function amenaza()
    {
        return $this->belongsTo('App\Amenaza');
    }

    public function oportunidad()
    {
        return $this->belongsTo('App\Oportunidad');
    }
}
