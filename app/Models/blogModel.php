<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogModel extends Model
{
    protected $table='blogs';
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen'
    ];
}
