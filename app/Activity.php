<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'nombre','alta','media','baja','muy_bueno','bueno','deficiente','muy_deficiente','valor'
    ];


    public function area(){
        return $this->belongsTo('App\Area');
    }

    public function fortaleza()
    {
        return $this->belongsTo('App\Fortaleza');
    }

    public function debilidad()
    {
        return $this->belongsTo('App\Debilidad');
    }
}
