<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // Especifica que este modelo está asociado con la tabla 'product_imagen' en la base de datos
    protected $table = 'product_imagen';

     // Define los atributos que se pueden asignar de manera masiva
    protected $fillable = [
        'producto_id',
        'imagen'
    ];

}
