<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        
        'user_id',
        'num_Seguimiento',
        'nombre_Completo',
        'email',
        'telefono',
        'codigo_postal',
        'domicilio',
        'status_mensaje',
        'metodo_pago',
        'pago_id',
    ];

}
