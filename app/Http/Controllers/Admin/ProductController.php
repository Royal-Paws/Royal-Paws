<?php

namespace App\Http\Controllers\admin;

// Importaciones necesarias
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Obtiene todos los productos de la base de datos
        $productos = Product::all();
         // Retorna la vista 'admin.products.index' y pasa los productos obtenidos a la vista
        return view('admin.products.index', compact('productos'));
    }
     
    public function create()
    {
         // Obtiene todas las categorías de la base de datos
        $categories = Category::all();
        // Retorna la vista 'admin.products.create' y pasa las categorías obtenidas a la vista
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(ProductFormRequest $request)
    {
        // Valida los datos del formulario usando ProductFormRequest (app/http/requests)
        $validatedData =$request->validated();

        // Busca la categoría a la que pertenece el producto usando el ID de la categoría validada
        $category = Category::findOrFail($validatedData['category_id']);
        // Crea un nuevo producto asociado a la categoría
        $producto = $category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'nombre' => $validatedData['nombre'],
            'urlP' => $validatedData['urlP'],
            'descripcion_breve' => $validatedData['descripcion_breve'],
            'descripcion' => $validatedData['descripcion'],
            'precio_original' => $validatedData['precio_original'],
            'precio_venta' => $validatedData['precio_venta'],
            'talla' => $validatedData['talla'],
            'status' => $request->status == true ? '1':'0',
            'meta_titulo' => $validatedData['meta_titulo'],
            'palabras_clave' => $validatedData['palabras_clave'],
            'meta_descripcion' => $validatedData['meta_descripcion'],
        ]);

        // Si el formulario incluye archivos de imagen, los maneja y guarda
        if($request->hasFile('imagen')){
            $uploadPath = 'uploads/products/';
            // Recorre cada archivo de imagen y lo guarda
            foreach($request->file('imagen') as $imageFile){

                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                // Crea un registro de imagen asociado al producto
                $producto->productImages()->create([
                    'producto_id' => $producto->id,
                    'imagen' => $finalImagePathName,
                ]);
            }
        }
        // Redirige a la página de listado de productos con un mensaje de éxito
        return redirect('/admin/producto')->with('message','El producto ha sido agregado correctamente');
    }

    public function edit(int $producto_id)
    {
        // Obtiene todas las categorías de la base de datos
        $categories = Category::all();
        // Busca el producto por su ID, si no se encuentra lanza una excepción
        $producto = Product::findOrFail($producto_id);
        // Retorna la vista 'admin.products.edit' y pasa las categorías y el producto obtenidos a la vista
        return view('admin.products.edit', compact('categories','producto'));
    }
     
    /**
     * Update the specified resource in storage.
     */

    public function update(ProductFormRequest $request, int $producto_id)
    {
        $validatedData = $request->validated();
     
         // Buscar el producto por ID
        $producto = Category::findOrFail($validatedData['category_id'])
                    ->products()->where('id', $producto_id)->first();
     
         // Verificar si el producto existe
        if ($producto) {
             // Actualizar los datos del producto
            $producto->update([
                'category_id' => $validatedData['category_id'],
                'nombre' => $validatedData['nombre'],
                'urlP' => $validatedData['urlP'],
                'descripcion_breve' => $validatedData['descripcion_breve'],
                'descripcion' => $validatedData['descripcion'],
                'precio_original' => $validatedData['precio_original'],
                'precio_venta' => $validatedData['precio_venta'],
                'talla' => $validatedData['talla'],
                'status' => $request->status ? '1' : '0',
                'meta_titulo' => $validatedData['meta_titulo'],
                'palabras_clave' => $validatedData['palabras_clave'],
                'meta_descripcion' => $validatedData['meta_descripcion'],
            ]);
     
             // Subir imágenes si se han proporcionado
            if ($request->hasFile('imagen')) {
                foreach ($request->file('imagen') as $imageFile) {
                     // Guardar la imagen en la carpeta de carga
                    $uploadPath = 'uploads/products/';
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
     
                     // Crear una nueva entrada en la tabla de imágenes de productos
                    $producto->productImages()->create([
                        'producto_id' => $producto->id,
                        'imagen' => $finalImagePathName,
                    ]);
                }
            }
     
            // Redirige a la página de listado de productos en el panel de administración con un mensaje de éxito
            return redirect('/admin/producto')->with('message', 'El producto ha sido actualizado correctamente');
        } else {
            // Redirige a la página de listado de productos en el panel de administración con un mensaje indicando que el producto no fue encontrado
            return redirect('admin/producto')->with('message', 'El producto no fue encontrado');
        }
    }
    /**
     * Remove the specified resource from storage.
     */

    
    public function destroyImage($producto_imagen_id)
    {
        // Busca la imagen del producto por su ID, si no se encuentra lanza una excepción
        $productImage = ProductImage::findOrFail($producto_imagen_id);
        // Verifica si el archivo de la imagen existe en el sistema de archivos y lo elimina
        if(File::exists($productImage->imagen)){
            File::delete($productImage->imagen);
        }
        // Elimina el registro de la imagen del producto en la base de datos
        $productImage->delete();
        // Redirige de vuelta a la página anterior con un mensaje de éxito
        return redirect()->back()->with('message','Imagen del Producto eliminado correctamente');
    }
    
    public function destroy(int $producto_id)
    {
        // Busca el producto por su ID, si no se encuentra lanza una excepción
        $product = Product::findOrFail($producto_id);
        // Verifica si el producto tiene imágenes asociadas
        if($product->productImages){
            // Recorre cada imagen del producto
            foreach($product->productImages as $imagen){
                // Verifica si el archivo de la imagen existe en el sistema de archivos y lo elimina
                if(File::exists($imagen->imagen)){
                    File::delete($imagen->imagen);
            
                }
            }
        }
        // Elimina el producto de la base de datos
        $product->delete();
        
        // Redirige de vuelta a la página anterior con un mensaje de éxito
        return redirect()->back()->with('message','Producto eliminado');
        
    }
}