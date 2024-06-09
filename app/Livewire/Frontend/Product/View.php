<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $product, $category; // Propiedades públicas para almacenar el producto y la categoría
    public $quantity = 1; // Cantidad por defecto
    public $selectedSize; // Propiedad para la talla seleccionada
    public $showAlert = false; // Indicador para mostrar alerta

    // Método para agregar un producto al carrito
    public function addToCart(int $productId)
    {
        // Obtener la talla seleccionada
        $talla = $this->selectedSize;

        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            if (!$this->selectedSize) {
                // Mostrar mensaje de alerta si no se ha seleccionado una talla
                $this->showAlert = true;
                return;
            } else {
                // Crear un nuevo elemento en el carrito
                $this->showAlert = false;
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'producto_id' => $productId,
                    'talla' => $talla,
                    'cantidad' => $this->quantity
                ]);
                session()->flash('message', 'Producto añadido al carrito');
            }
        } else {
            // Mostrar mensaje si el usuario no está autenticado
            //session()->flash('message', 'Por Favor Inicie Sesión Para Poder Comprar');
            // Llevar al inicio de sesión
            return redirect('/login')->with('message','Por Favor Inicie Sesión Para Poder Comprar');;
            
        }
    }
    
    // Método mount para inicializar las propiedades con el producto y la categoría recibidos
    public function mount($product, $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    // Método para incrementar la cantidad
    public function incrementQuantity()
    {
        $this->quantity++;
    }

    // Método para decrementar la cantidad
    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    // Método para renderizar el componente
    public function render()
    {
        // Retorna la vista 'livewire.frontend.product.view' y pasa el producto y la categoría a la vista
        return view('livewire.frontend.product.view',[
            'product' => $this->product,
            'category' => $this->category
        ]);
    }
}
