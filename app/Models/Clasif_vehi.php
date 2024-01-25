<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasif_vehi extends Model
{
    use HasFactory;

    protected $table = "clasific_vehi";

    protected $fillable = [
        'descripcion'
    ];
}
