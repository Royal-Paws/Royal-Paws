<?php

namespace App\Http\Controllers\Admin;

// Importaciones necesarias
use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todas las ventas usando el método estático 'getVenta' del modelo Venta
        $ventas = Venta::getVenta();
        // Retorna la vista 'admin.sales.index' y pasa las ventas obtenidas a la vista
        return view('admin.sales.index',["ventas"=>$ventas]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('admin.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$url = env('API_URL');
        //$response = Http::post('127.0.0.1:8000/api/ventas', [
        //    'usuario_ID' => auth()->user()->id,
        //    'descripcion' => $request->descripcion,
        //    'precio_Total' => $request->precio_Total,
        //    'nombre_pago' => $request->nombre_cliente,
        //    'email_pago' => $request->correo,
        //    'direccion' => $request->domicilio,
        //    'estado' => $request->estado,
        //]);

        //$ventas = Venta::getVenta();
        //return view('admin.sales.index',["ventas"=>$ventas]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos de la solicitud, si es necesario
        $request->validate([
            'direccion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);
    
        // Preparar los datos para enviar a la API externa
        $data = [
            'direccion' => $request->direccion,
            'estado' => $request->estado,
        ];
    
        // Enviar una solicitud PUT a la API externa para actualizar los datos
        $response = Http::put('http://127.0.0.1:8000/api/ventas/' . $id, $data);
    
        // Manejar la respuesta de la API
        if ($response->successful()) {
            // Guardar mensaje de éxito en la sesión
            session()->flash('message', 'Datos actualizados correctamente.');
        } else {
            // Guardar mensaje de error en la sesión
            session()->flash('message', 'Error al actualizar los datos.');
        }
    
        // Redirigir a la página anterior 
        return redirect()->back();
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Enviar una solicitud DELETE a la API externa para eliminar los datos
    $response = Http::delete('http://127.0.0.1:8000/api/ventas/' . $id);

    // Manejar la respuesta de la API
    if ($response->successful()) {
        // Guardar mensaje de éxito en la sesión
        session()->flash('message', 'Venta eliminada correctamente.');
    } else {
        // Guardar mensaje de error en la sesión
        session()->flash('message', 'Error al eliminar la venta.');
    }

    // Redirigir a la página anterior 
    return redirect()->back();
}
}
