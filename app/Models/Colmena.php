<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Colmena extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'nombre_colmena',
        'codigo_colmena',
        'activa',
        'user_id'
    ];

    public $timestamps = false;
}
