<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'aut_rec',
        'titular',
        'cpet_inv',
        'delito_id',
    ];
}
