<?php

namespace App\Http\Controllers\Admin;


// Importaciones necesarias
use App\Http\Controllers\Controller; 
use App\Models\Category; 
use App\Http\Requests\CategoryFormRequest; 
use Illuminate\Http\Request; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File; 


class CategoryController extends Controller
{
    // Método para mostrar la vista de índice de categorías
    public function index()
    {
        return view('admin.category.index');
    }

    // Método para mostrar la vista de creación de una nueva categoría
    public function create()
    {
        return view('admin.category.create');
    }

     // Método para almacenar una nueva categoría en la base de datos
    public function store(CategoryFormRequest $request)
    {
        // Validación de los datos del formulario usando CategoryFormRequest (app/http/requests)
        $validatedData = $request->validated();

        // Crear una nueva instancia del modelo Category y asignar los valores validados
        $categoria = new Category;
        $categoria->nombre = $validatedData['nombre'];
        $categoria->urlP = Str::slug($validatedData['urlP']);
        $categoria->descripcion = $validatedData['descripcion'];

        // Manejo de la subida de la imagen
        $uploadPath = 'uploads/categoria/';
        if($request->hasFile('imagen')){
            $file = $request->file ('imagen');
            $ext = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$ext;

            $file->move('uploads/categoria/',$filename);
            $categoria->imagen = $uploadPath.$filename;
        }

        // Asignación de valores adicionales
        $categoria->meta_titulo = $validatedData['meta_titulo'];
        $categoria->palabras_clave = $validatedData['palabras_clave'];
        $categoria->meta_descripcion = $validatedData['meta_descripcion'];

        // Asignación del estado de la categoría
        $categoria->status = $request->status == true ? '1':'0';

        // Guardar la nueva categoría en la base de datos
        $categoria->save();

        // Redireccionar con un mensaje de éxito
        return redirect('admin/categoria')->with('message','Categoría agregada correctamente');
    }
    
    // Método para mostrar la vista de edición de una categoría específica
    public function edit (Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    // Método para actualizar una categoría existente en la base de datos
    public function update(CategoryFormRequest $request, $category)
    {
        // Validación de los datos del formulario usando CategoryFormRequest
        $validatedData = $request->validated();

        // Buscar la categoría por su ID
        $categoria = Category::findOrFail($category);
        
        // Actualizar los valores de la categoría
        $categoria->nombre = $validatedData['nombre'];
        $categoria->urlP = Str::slug($validatedData['urlP']);
        $categoria->descripcion = $validatedData['descripcion'];
        $uploadPath = 'uploads/categoria/';

        // Manejo de la subida de la nueva imagen
        if($request->hasFile('imagen')){
            $path= 'uploads/categoria/'.$categoria->imagen;
            // Eliminar la imagen antigua si existe
            if(File::exists($path)){
                File::delete($path);
            }

            // Subir la nueva imagen
            $file = $request->file ('imagen');
            $ext = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$ext;

            $file->move('uploads/categoria/',$filename);
            $categoria->imagen = $uploadPath.$filename;
        }

        // Asignación de valores adicionales
        $categoria->meta_titulo = $validatedData['meta_titulo'];
        $categoria->palabras_clave = $validatedData['palabras_clave'];
        $categoria->meta_descripcion = $validatedData['meta_descripcion'];

        // Asignación del estado de la categoría
        $categoria->status = $request->status == true ? '1':'0';
        $categoria->update();

        // Redireccionar con un mensaje de éxito
        return redirect('admin/categoria')->with('message','Categoría actualizada correctamente');
        
    }
}
