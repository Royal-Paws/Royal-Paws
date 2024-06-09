<?php

namespace App\Livewire\Admin\Category;

// Importaciones de clases y facades necesarios
use Livewire\Component; 
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\File;

// Definición de la clase Index que extiende de Component
class Index extends Component 
{
    use WithPagination; // Uso del trait WithPagination para la paginación
    protected $paginationTheme = 'bootstrap'; // Tema de paginación

    public $category_id; // Propiedad pública para almacenar el ID de la categoría a eliminar
    
    // Método para establecer el ID de la categoría a eliminar
    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    // Método para eliminar una categoría
    public function destroyCategory()
    {
        // Busca la categoría por su ID
        $category = Category::find($this->category_id);
        // Obtiene la ruta de la imagen de la categoría
        $path = 'uploads/categoria/'.$category->imagen;
        // Si la imagen existe, la elimina
        if(File::exists($path)){
            File::delete($path);
        }
        // Elimina la categoría de la base de datos
        $category->delete();
        //$this->dispatchBrowserEvent('close-modal');

        // Envía un mensaje de éxito
        session()->flash('message','La Categoría ha sido eliminada correctamente');
        
    }

    // Método para renderizar el componente
    public function render()
    {
        // Obtiene todas las categorías ordenadas por ID y paginadas
        $categories=Category::orderBy('id','ASC')->paginate(5);
        // Retorna la vista 'livewire.admin.category.index' y pasa las categorías obtenidas a la vista
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
