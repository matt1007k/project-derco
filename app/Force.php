<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    protected $fillable = ['nombre'];

    public function keys()
    {
        return $this->hasMany('App\Key');
    }
}
