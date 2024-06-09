<?php

namespace App\Http\Controllers\Admin;

// Importaciones necesarias
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Método para mostrar todos los sliders
    public function index()
    {
        // Obtiene todos los sliders de la base de datos
        $sliders = Slider::all();
        // Retorna la vista 'admin.slider.index' y pasa los sliders obtenidos a la vista
        return view('admin.slider.index', compact('sliders'));
    }

    // Método para mostrar la vista de creación de un nuevo slider
    public function create()
    {
        // Retorna la vista 'admin.slider.create'
        return view('admin.slider.create');
    }

    // Método para almacenar un nuevo slider en la base de datos
    public function store(SliderFormRequest $request)
    {
         // Valida los datos del formulario usando SliderFormRequest (app/http/requests)
        $validatedData = $request->validated();

        // Si el formulario incluye un archivo de imagen, lo maneja y guarda
        if($request->hasFile('imagen')){
            
            $file = $request->file ('imagen');
            $ext = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['imagen']= "uploads/slider/$filename";
        }

        // Asigna el estado del slider basado en el valor del request
        $validatedData['status'] = $request->status == true ? '1':'0';

        // Crea un nuevo slider con los datos validados
        Slider::create([
            'titulo'=>$validatedData['titulo'],
            'descripcion'=>$validatedData['descripcion'],
            'imagen'=>$validatedData['imagen'],
            'status'=>$validatedData['status'],
        ]);

        // Redirige a la página de listado de sliders con un mensaje de éxito
        return redirect('admin/sliders')->with('message','Slider agregado correctamente');
    }

    // Método para mostrar la vista de edición de un slider específico
    public function edit(Slider $slider)
    {
        // Retorna la vista 'admin.slider.edit' y pasa el slider específico a la vista
        return view('admin.slider.edit',compact('slider'));
    }

    // Método para actualizar un slider existente en la base de datos
    public function update(SliderFormRequest $request, Slider $slider)
    {
         // Valida los datos del formulario usando SliderFormRequest
        $validatedData = $request->validated();
    
        // Si el formulario incluye un archivo de imagen, lo maneja y guarda
        if ($request->hasFile('imagen')) {
            $destino = $slider->imagen;
             // Elimina la imagen antigua si existe
            if (File::exists($destino)) {
                File::delete($destino);
            }
            
            // Sube la nueva imagen
            $file = $request->file('imagen');
            $ext = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['imagen'] = "uploads/slider/$filename";
        }
    
        // Asigna el estado del slider basado en el valor del request
        $validatedData['status'] = $request->status == true ? '1' : '0';
    
        // Datos a actualizar
        $updateData = [
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
            'status' => $validatedData['status'],
        ];
    
        // Incluye la nueva imagen si se ha subido una
        if (isset($validatedData['imagen'])) {
            $updateData['imagen'] = $validatedData['imagen'];
        }
    
        // Actualiza el slider en la base de datos
        Slider::where('id', $slider->id)->update($updateData);
        // Redirige a la página de listado de sliders con un mensaje de éxito
        return redirect('admin/sliders')->with('message', 'Slider actualizado correctamente');
    }

    // Método para eliminar un slider de la base de datos
    public function destroy(Slider $slider)
    {

        // Verifica si el slider tiene al menos un registro
        if($slider->count() > 0){
            // Elimina la imagen asociada si existe
            $destino = $slider -> imagen;
            if(File::exists($destino)){
                File::delete($destino);
            }
            // Elimina el slider de la base de datos
            $slider->delete();
            // Redirige a la página de listado de sliders con un mensaje de éxito
            return redirect('admin/sliders')->with('message','Slider eliminado correctamente');
        }
        // Redirige a la página de listado de sliders con un mensaje de error
        return redirect('admin/sliders')->with('message','Algo salio mal :(');
    }
}
