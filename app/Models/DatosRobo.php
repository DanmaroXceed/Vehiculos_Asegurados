<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosRobo extends Model
{
    use HasFactory;

    protected $table = "datos_robo";

    protected $fillable = [
        'fuente_id',
        'lugar',
        'fecha',
        'forma_robo_id'
    ];
}
