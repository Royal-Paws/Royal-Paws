<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [

        'orden_id',
        'producto_id',
        'talla',
        'cantidad',
        'precio',
    ];
}
