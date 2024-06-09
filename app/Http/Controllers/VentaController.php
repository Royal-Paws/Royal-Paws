<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todas las ventas usando el método estático 'getVenta' del modelo Venta
        $ventas = Venta::getVenta();
         // Retorna la vista 'frontend.venta.index' y pasa las ventas obtenidas a la vista
        return view('frontend.venta.index',["ventas"=>$ventas]); 
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtiene la URL de la API desde el archivo de configuración
        $url = env('API_URL');
        // Realiza una solicitud POST a la API para crear una nueva venta
        $response = Http::post('https://royalpaws.000webhostapp.com/api/ventas', [
            'usuario_ID' => auth()->user()->id,
            'descripcion' => $request->descripcion,
            'precio_Total' => $request->precio_Total,
            'nombre_pago' => $request->nombre_cliente,
            'email_pago' => $request->correo,
            'direccion' => $request->domicilio,
            'estado' => $request->estado,
        ]);

        // Redirige a la página de agradecimiento
        return redirect()->to('gracias');
    }
    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
