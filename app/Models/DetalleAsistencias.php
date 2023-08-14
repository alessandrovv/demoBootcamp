<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAsistencias extends Model
{
    use HasFactory;

    public function estado(){
        return $this->belongsTo(EstadoAsistencia::class, 'idEstado');
    }

    public function asistencia(){
        return $this->belongsTo(Asistencia::class, 'idAsistencia');
    } 
}
