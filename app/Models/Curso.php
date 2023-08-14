<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public $table='cursos';
    protected $fillable=['nombre','docente','area', 'nivel','activo','created_at','updated_at'];
    protected $guarded = [];
    use HasFactory;
}
