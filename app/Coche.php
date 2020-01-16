<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    public function conductores(){
        return $this->belongsToMany('App\Conductor');
    }

    public function incidencias(){
        return $this->hasMany('App\Incidencia');
    }
}
