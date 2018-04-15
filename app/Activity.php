<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['nombre'];

    public function area(){
        return $this->belongsTo('App\Area');
    }
}
