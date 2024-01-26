<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = "localidades";

    protected $fillable = [
        'municipio_id',
        'estado_id',
        'descripcion',
    ];
}
