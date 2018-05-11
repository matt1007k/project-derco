<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidad extends Model
{
    protected $table = 'oportunidades';
    protected $fillable = ['slug','nombre'];

    public function keys()
    {
        return $this->hasMany('App\Key');
    }
}
