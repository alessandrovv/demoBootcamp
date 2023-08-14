<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleContrato extends Model
{
    use HasFactory;
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'idContrato');
    }
}
