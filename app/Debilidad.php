<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debilidad extends Model
{
    protected $table = 'debilidades';
    protected $fillable = ['slug','nombre'];

    public function activities()
    {
        return $this->hasMany('App\activity');
    }
}
