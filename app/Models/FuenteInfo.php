<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteInfo extends Model
{
    use HasFactory;

    protected $table = "fuentes_info";

    protected $fillable = [
        'descripcion'
    ];
}
