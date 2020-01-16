<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
   public function tecnicos(){
       return $this->hasMany('App\Tecnico');
   }

   public function incidencias(){
       return $this->hasMany('App\Incidencia');
   }

}
