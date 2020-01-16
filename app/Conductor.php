<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    public function coches(){
        return $this->belongsToMany('App\Coche','conductor_coche','conductor_id','coche_id');
    }

    public function incidencias(){
        return $this->hasMany('App\Incidencia');
    }
}
