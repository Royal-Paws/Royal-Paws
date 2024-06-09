<?php

namespace App\Livewire\Frontend\Checkout;

// Importaciones de clases necesarias
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class CheckoutShow extends Component
{
    public $carts, $cantidadTotalProductos = 0; // Propiedades públicas para almacenar los elementos del carrito y la cantidad total de productos

    // Propiedades para la información del pedido
    public $nombreCompleto;
    public $descripcion;
    public $email_pago;
    public $direccion;
    public $estado;

    // Reglas de validación para la información del pedido
    protected $rules = [
        'usuario_ID' => 'required|integer',
        'descripcion' => 'required|string',
        'precio_Total' => 'required|numeric',
        'nombre_pago' => 'required|string',
        'email_pago' => 'required|email',
        'direccion' => 'required|string',
        'estado' => 'required|string',
    ];


    // Reglas de validación para la información del pedido
    public function order()
    {
        // Realiza una solicitud POST a la API para crear un nuevo pedido
        $order = Http::post(env('API_URL') . '/ventas', [
            'usuario_ID' => auth()->user()->id,
            'descripcion' => $this->descripcion,
            'precio_Total' => $this->cantidadTotalProductos(),
            'nombre_pago' => $this->nombreCompleto,
            'email_pago' => 'juan@gmail.com',
            'direccion' => 'En Proceso De Comprobación de Compra',
            'estado' => 'En Proceso De Comprobación de Compra',
        ]);
    
        return $order;
    }
    
    // Método para vaciar el carrito
    public function vaciarCarrito()
    {
        // Variable para indicar si se procesó correctamente el pedido
        $codOrder = true;
        // Si se procesó correctamente el pedido, elimina los elementos del carrito
        if ($codOrder) {
            Cart::where('user_id', auth()->id())->delete();
            session()->flash('message', 'Se eliminaron los productos del carrito correctamente.');
            return redirect()->to('gracias');
        } else {
            session()->flash('message', 'Hubo un problema al procesar la orden. Los productos no se eliminaron del carrito.');
        }

    }

    // Método para calcular la cantidad total de productos en el carrito
    public function cantidadTotalProductos()
    {
        // Obtiene todos los elementos del carrito del usuario autenticado
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        // Itera sobre los elementos del carrito y calcula la cantidad total de productos
        foreach ($this->carts as $cartItem){
            $this->cantidadTotalProductos += $cartItem->product->precio_venta * $cartItem->cantidad;
        }
        return $this->cantidadTotalProductos;
    }

    // Método para renderizar el componente
    public function render()
    {
        // Asigna valores a las propiedades de información del pedido
        $this->nombreCompleto = auth()->user()->name;
        $this->usuario_id = auth()->user()->id;
        $this->email = auth()->user()->email;

        // Obtiene todos los elementos del carrito del usuario autenticado
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
       
        // Calcula la cantidad total de productos en el carrito
        $this->cantidadTotalProductos = $this->cantidadTotalProductos();
        
        // Retorna la vista 'livewire.frontend.checkout.checkout-show' y pasa la cantidad total de productos y el carrito a la vista
        return view('livewire.frontend.checkout.checkout-show',[
            'cantidadTotalProductos' => $this->cantidadTotalProductos,
            'cart' => $this->cart
        ]);
    }
}
