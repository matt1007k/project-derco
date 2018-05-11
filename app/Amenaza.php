<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenaza extends Model
{
    protected $fillable = ['slug','nombre'];

    public function keys()
    {
        return $this->hasMany('App\Key');
    }
}
