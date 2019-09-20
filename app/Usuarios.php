<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

    protected $with =['empresa'];
    public function empresa(){
        return $this->belongsTo(Empresas::class);
    }
    public function categoria(){
        return $this->belongsTo(Categorias::class);
    }
}
