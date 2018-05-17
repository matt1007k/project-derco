<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    protected $fillable = ['nombre','foda','tipo'];


    public function objetivo(){
        return $this->belongsTo('App\Objetivo');
    }
}
