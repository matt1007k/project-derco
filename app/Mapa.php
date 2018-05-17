<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    protected $fillable = ['nombre'];


    public function objetivos(){
        return $this->hasMany('App\Objetivo');
    }
}
