<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $table = "lugares";

    protected $fillable = [
        'est_id',
        'mun_id',
        'loc_id',
        'calle',
        'numero',
        'colonia',
    ];
}
