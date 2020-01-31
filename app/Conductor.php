<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    public function coches(){
        return $this->belongsToMany('App\Coche');
    }

    public function incidencias(){
        return $this->hasMany('App\Incidencia');
    }
}
