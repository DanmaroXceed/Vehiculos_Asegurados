<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguramiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo_id',
        'autoridad_as_id',
        'personas',
        'deposito',
        'fecha',
        'datos_robo_id'
    ];
}
