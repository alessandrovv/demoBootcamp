<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $table='pagos';
    protected $fillable=['monto','activo','created_at','updated_at'];
    protected $guarded = [];
    use HasFactory;
    
    public function detalleContrato(){
        return $this->belongsTo(DetalleContrato::class, 'idDetalleContrato', 'id');
    }

}
