<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['nombre'];

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    
}
