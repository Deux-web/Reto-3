<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    public function conductor(){
        return $this->belongsTo('App\Conductor');
    }

    public function coche(){
        return $this->belongsTo('App\Coche');
    }

    public function centro(){
        return $this->belongsTo('App\Centro');
    }

    public function tecnico(){
        return $this->belongsTo('App\Tecnico');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }
}
