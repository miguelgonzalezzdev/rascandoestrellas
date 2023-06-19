<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\elemento;
use App\Models\Post;

class ElementoController extends Controller
{
    //MUESTRA LA PAGINA PRINCIPAL DE ELEMENTO
    public function index(elemento $elemento){
        
        $posts = Post::where('elemento_id', $elemento->id)->pluck('id'); 

        $totalPuntuacion = Post::where('elemento_id', $elemento->id)->pluck('puntuacion')->sum();

        return view('secciones.elementoprincipal', [
            'elemento' => $elemento,
            'posts' => $posts,
            'totalPuntuacion' => $totalPuntuacion
        ]);
    }

    //IR AL LISTADO DE CRUD
    public function show(){
        
        $elementos = elemento::paginate(20);

        return view('gestion.index', [
            'elementos' => $elementos,
        ]);
    }

    //IR A LA CREACION DE ELEMENTOS
    public function create(){

        return view('gestion.create');
    }

    //GUARDAR ELEMENTO
    public function store(Request $request){
        
        //VALIDACION
        $this->validate($request, [
            'tipo' => 'required|numeric|max:3|min:1',
            'titulo' => 'required',
            'fecha' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        //IMAGEN
        if($request->imagen){
            $imagen=$request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();//crea un id unico

            $imagenServidor=Image::make($imagen);//crear instancia de la imagen
            $imagenServidor->fit(1000,1000);//fijar relacion de acpecto

            $imagenPath=public_path('elementos').'/'.$nombreImagen;//ruta donde se guarda el archivo
            $imagenServidor->save($imagenPath);
        }else{
            $nombreImagen="";
        }

        //GUARDAR
        elemento::create([
            'tipo_elemento' => $request->tipo,
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'productor' => $request->productor,
            'fecha_lanzamiento' => $request->fecha,
            'genero1' => $request->generouno,
            'genero2' => $request->generodos,
            'genero3' => $request->generotres,
            'genero4' => $request->generocuatro,
            'genero5' => $request->generocinco,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreImagen
        ]);

        return redirect()->action([ElementoController::class, 'show']);
    }

    //BORRAR ELEMENTO
    public function destroy(elemento $elemento){
        //$this->authorize('delete', $elemento);//Policy ElementoPolicy
        
        $rutaImagen = public_path('elementos/'.$elemento->imagen); //Ruta de la imagen
        
        // Verificar si la imagen existe
        if(file_exists($rutaImagen)) {
            File::delete($rutaImagen);// Eliminar la imagen utilizando
        }

        //Borrar elemento de la bbdd
        $elemento->delete();

        return redirect()->action([ElementoController::class, 'show']);
    }

    //IR A LA VISTA DE EDITAR
    public function edit(elemento $elemento){
        return view('gestion.edit', [
            'elemento' => $elemento,
        ]);
    }

    //ACTUALIZAR ELEMENTO
    public function update(Request $request, $elemento_id){
        
        //VALIDACION
        $this->validate($request, [
            'tipo' => 'required|numeric|max:3|min:1',
            'titulo' => 'required',
            'fecha' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        //IMAGEN
        if($request->imagen){
            $imagen=$request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();//crea un id unico

            $imagenServidor=Image::make($imagen);//crear instancia de la imagen
            $imagenServidor->fit(1000,1000);//fijar relacion de acpecto

            $imagenPath = 'img/imagenPath/' . $nombreImagen;//ruta donde se guarda el archivo
            $imagenServidor->save($imagenPath);
        }else{
            $nombreImagen="";
        }

        //guardar cambios 
        $elemento=elemento::find($elemento_id);
        $elemento->tipo_elemento = $request->tipo;
        $elemento->titulo = $request->titulo;
        $elemento->autor = $request->autor;
        $elemento->productor = $request->productor;
        $elemento->fecha_lanzamiento = $request->fecha;
        $elemento->genero1 = $request->generouno;
        $elemento->genero2 = $request->generodos;
        $elemento->genero3 = $request->generotres;
        $elemento->genero4 = $request->generocuatro;
        $elemento->genero5 = $request->generocinco;
        $elemento->descripcion = $request->descripcion;
        if($request->imagen){
            $elemento->imagen = $nombreImagen ?? '';
        }
        $elemento->save();

        return redirect()->action([ElementoController::class, 'show']);
    } 
}
