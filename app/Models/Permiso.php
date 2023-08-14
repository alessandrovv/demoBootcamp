<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public $table='permisos';
    protected $fillable=['name','created_at','updated_at'];
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_permiso', 'idRol', 'idPermiso');
    }
    use HasFactory;
}
