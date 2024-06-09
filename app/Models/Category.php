<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    // Nombre de la tabla en la base de datos
    protected $table = 'categories';

    // Atributos que pueden ser asignados en masa
    protected $fillable = [
        'nombre',
        'urlP',
        'descripcion',
        'imagen',
        'meta_titulo',
        'palabras_clave',
        'meta_descripcion',
        'status',
    ];

    // Relación con el modelo Product
    public function products()
    {
        // Esta línea devuelve una relación de "uno a muchos" entre el modelo actual y el modelo Product.
        return $this->hasMany(Product::class,'category_id','id');
    }
}
