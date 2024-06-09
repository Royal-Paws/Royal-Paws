<?php
namespace App\Livewire\Frontend\Cart;

// Importaciones de clases necesarias
use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount; // Propiedad pública para almacenar el conteo del carrito


    public function checkCartCount() // Método para verificar y obtener el conteo del carrito del usuario autenticado
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Si está autenticado, cuenta la cantidad de elementos en el carrito del usuario
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            // Si no está autenticado, establece el conteo del carrito en 0
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        // Llama al método para verificar el conteo del carrito
        $this->cartCount = $this->checkCartCount();
        // Retorna la vista 'livewire.frontend.cart.cart-count' y pasa el conteo del carrito a la vista
        return view('livewire.frontend.cart.cart-count',[
            'cartCount' => $this->cartCount
        ]);
    }
}