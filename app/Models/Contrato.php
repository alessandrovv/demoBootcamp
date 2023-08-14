<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    public function alumnos(){
        return $this->belongsTo(Alumno::class, 'idAlumno', 'id');
    }

    public function grupos(){
        return $this->belongsTo(Grupo::class,  'idGrupo', 'id');
    }

    public function planes(){
        return $this->belongsTo(Plan::class, 'idPlan', 'id');
    }
}
