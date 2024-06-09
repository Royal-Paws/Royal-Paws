<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{
    public $products, $category; // Propiedades públicas para almacenar los productos y la categoría

    // Método mount para inicializar las propiedades con los productos y la categoría recibidos
    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category; 
    }
    
    // Método para renderizar el componente
    public function render()
    {
        // Retorna la vista 'livewire.frontend.product.index' y pasa los productos y la categoría a la vista
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
