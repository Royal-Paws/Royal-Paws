<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class EliminarProductoCarrito extends Component
{
    public $producto; // Propiedad pública para almacenar el producto
    public $confirmarEliminar = false; // Indicador para confirmar la eliminación

    // Método mount para inicializar la propiedad producto con el elemento del carrito correspondiente al ID recibido
    public function mount($id)
    {
        $this->producto = Cart::findOrFail($id);
    }

    // Método para confirmar la eliminación del producto del carrito
    public function confirmarEliminacion()
    {
        $this->producto->delete(); // Elimina el producto del carrito
        return redirect()->to('/carrito'); // Redirige a la página del carrito
    }

    // Método para renderizar el componente
    public function render()
    {
        // Retorna el componente en formato de cadena de texto HTML
        return <<<'blade'
            <div>
                <button wire:click="$toggle('confirmarEliminar')" class=" mt-3 w-full btn" style="background-color: #224263; display: block; width: 250px; max-width: 400px; text-align: center; color: white;" >Eliminar</button>
                <br/>
                @if($confirmarEliminar)
                    <div class="card">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">¿Estás seguro? </h3>
                        </div>
                        <center>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button wire:click="confirmarEliminacion" type="button" class="btn btn-danger">
                                    Eliminar
                                </button>
                                <button wire:click="$toggle('confirmarEliminar')" type="button" class=" btn btn-warning" data-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>
                        </center>
                    </div>
                @endif
            </div>
        blade;
    }
}