<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'clasific_id',
        'tipo_id',
        'marca_id',
        'submarca_id',
        'color',
        'anio_mod',
        's_orig',
        's_apo',
        'no_motor',
        'placas',
        'cond_vehi',
        'or_sob'
    ];
}
