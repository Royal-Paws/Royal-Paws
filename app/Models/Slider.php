<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    // Especifica que este modelo está asociado con la tabla 'sliders' en la base de datos
    protected $table = 'sliders';

    // Define los atributos que se pueden asignar de manera masiva
    protected $fillable = [

        'titulo',
        'descripcion',
        'imagen',
        'status'
    ];
}
