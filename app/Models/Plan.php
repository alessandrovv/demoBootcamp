<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $table='planes';
    protected $fillable=['descripcion','costo','activo','created_at','updated_at'];
    protected $guarded = [];
    use HasFactory;
}
