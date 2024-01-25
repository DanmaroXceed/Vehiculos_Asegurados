<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_vehi extends Model
{
    use HasFactory;

    protected $table = "tipo_vehi";
    
    protected $fillable = [
        'clasific_id',
        'descripcion'
    ];
}
