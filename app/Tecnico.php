<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    public function centro(){
        return $this->belongsTo('App\Centro');
    }

    public function incidencias(){
        return $this->hasMany('App\Incidencia');
    }
}
