<?php

namespace App\Models;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Especifica que este modelo está asociado con la tabla 'products' en la base de datos
    protected $table = 'products';

    // Define los atributos que se pueden asignar de manera masiva
    protected $fillable = [

        'category_id',
        'nombre',
        'urlP',
        'descripcion_breve',
        'descripcion',
        'precio_original',
        'precio_venta',
        'talla',
        'status',
        'meta_titulo',
        'palabras_clave',
        'meta_descripcion'

    ];

    // Define una relación "pertenece a" (belongsTo) entre el producto y la categoría.
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    // Define una relación "uno a muchos" (hasMany) entre el producto y sus imágenes.
    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'producto_id','id');
    }

}
