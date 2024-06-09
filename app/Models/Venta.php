<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Venta extends Model
{
    use HasFactory;


    public static function getVenta(){
        // Realiza una solicitud HTTP GET a la URL de la API definida en el archivo de configuración .env
        $response =Http::get(env('API_URL').'ventas');
        // Devuelve la respuesta de la API en formato JSON.
        return $response -> json();
    }
}
