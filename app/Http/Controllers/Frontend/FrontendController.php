<?php

namespace App\Http\Controllers\Frontend;

// Importaciones necesarias
use App\Models\Slider; 
use App\Models\Category; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Método para mostrar la página de inicio con sliders activos
    public function index()
    {
        // Obtiene todos los sliders con estado '0' (activos)
        $sliders = Slider::where('status','0')->get();
        // Retorna la vista 'frontend.index' y pasa los sliders obtenidos a la vista
        return view('frontend.index', compact('sliders'));
    }

    // Método para mostrar la página de categorías con categorías activas
    public function categories()
    {
        // Obtiene todas las categorías con estado '0' (activas)
        $categories = Category::where('status','0')->get();
        // Retorna la vista 'frontend.content.category.index' y pasa las categorías obtenidas a la vista
        return view('frontend.content.category.index', compact('categories'));
    }

    // Método para mostrar los productos de una categoría específica
    public function products($category_urlP)
    {
        // Busca la categoría por su URL amigable
        $category = Category::where('urlP', $category_urlP)->first();
        if($category){
            // Si la categoría existe, obtiene los productos de la categoría
            $products = $category->products()->get();
            // Retorna la vista 'frontend.content.products.index' y pasa los productos y la categoría obtenidos a la vista
            return view('frontend.content.products.index', compact('products','category'));
        } else {
            // Si la categoría no existe, redirige a la página anterior
            return redirect()->back();
        }
    }

    // Método para mostrar la vista de un producto específico dentro de una categoría
    public function productView(string $category_urlP, string $product_urlP)
    {
        // Busca la categoría por su URL amigable
        $category = Category::where('urlP', $category_urlP)->first();
        
        if($category){
            // Busca el producto por su URL amigable y estado '0' (activo) dentro de la categoría
            $product = $category->products()->where('urlP', $product_urlP)->where('status','0')->first();
            if($product)
            {
                // Si el producto existe, retorna la vista 'frontend.content.products.view' y pasa el producto y la categoría obtenidos a la vista
                return view('frontend.content.products.view',compact('product','category'));
            }else{
                // Si el producto no existe, redirige a la página anterior
                return redirect()->back();
            }
        }else{
            // Si la categoría no existe, redirige a la página anterior
            return redirect()->back();
        }
    }

    // Método para mostrar la página de agradecimiento
    public function gracias()
    {
        // Retorna la vista 'frontend.gracias'
        return view('frontend.gracias');
    }
}
