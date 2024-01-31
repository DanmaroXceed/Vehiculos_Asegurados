<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'aseguramiento_id',
        'lugar_id',
        'recibimiento_id',
        'cargo_id',
        'unidad_id',
        'distrito_id',
        'elemento',
        'fecha',
    ];
}
