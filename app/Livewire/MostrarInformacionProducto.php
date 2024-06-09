<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class MostrarInformacionProducto extends Component
{
    public $producto; // Propiedad pública para almacenar el producto
    public $mostrarDatos = false; // Indicador para mostrar u ocultar la descripción

    // Método mount para inicializar la propiedad producto con el elemento correspondiente al ID recibido
    public function mount($id)
    {
        $this->producto = Product::findOrFail($id);
    }

    // Método para renderizar el componente
    public function render()
    {
        // Retorna el componente en formato de cadena de texto HTML
        return <<<'blade'
        <div>
            <button wire:click="$toggle('mostrarDatos')" class="btn btn-informacion">
                {{ $this->mostrarDatos ? 'Ocultar Descripción' : 'Ver Descripción' }}
            </button>

            @if ($this->mostrarDatos)
                <div>
                    <div>
                    <br/>
                        <p>{{ $this->producto->descripcion_breve }}</p>
                    </div>
                </div>
            @endif
        </div>
        blade;
    }
}
