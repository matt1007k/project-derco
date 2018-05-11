<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fortaleza extends Model
{
    protected $fillable = ['slug','nombre'];

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
