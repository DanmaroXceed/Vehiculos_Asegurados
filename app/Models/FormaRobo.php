<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaRobo extends Model
{
    use HasFactory;

    protected $table = "formas_robo";

    protected $fillable = [
        'descripcion'
    ];
}
