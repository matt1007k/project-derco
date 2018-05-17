<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['nombre','foda'];


    public function estrategias(){
        return $this->hasMany('App\Estrategia');
    }

    public function mapa(){
        return $this->belongsTo('App\Mapa');
    }
}
