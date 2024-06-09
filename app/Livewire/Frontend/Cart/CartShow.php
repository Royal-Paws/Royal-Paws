<?php
 
namespace App\Livewire\Frontend\Cart;

// Importaciones de clases necesarias
use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0; // Propiedades públicas para almacenar el carrito y el precio total

    // Método para eliminar un elemento del carrito
    public function removeCartItem(int $cartId)
    {
        // Busca el elemento del carrito por su ID de usuario y su ID de carrito
        $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        // Si encuentra el elemento del carrito, lo elimina
        if($cartRemoveData){
            $cartRemoveData->delete();
        }
    }

    public function render()
    {
        // Obtiene todos los elementos del carrito del usuario autenticado
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        // Retorna la vista 'livewire.frontend.cart.cart-show' y pasa el carrito obtenido a la vista
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
