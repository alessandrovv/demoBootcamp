<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $table='rols';
    protected $fillable=['name','descripcion','activo','created_at','updated_at'];
    protected $guarded = [];

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rol_permiso', 'idRol', 'idPermiso');
    }
    use HasFactory;
}
