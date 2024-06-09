<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = "carts";

    // Atributos que pueden ser asignados en masa
    protected $fillable = [
        'user_id',
        'producto_id',
        'talla',
        'cantidad'
    ];

    // Relación con el modelo Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'producto_id', 'id');
    }
}

