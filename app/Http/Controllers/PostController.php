<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;
use App\Models\Post;

class PostController extends Controller
{

    //Ir a reseña
    public function create(elemento $elemento){
        return view('crear-resena', ['elemento' => $elemento]);
    }

    //guardar la reseña en bbdd
    public function store(Request $request, elemento $elemento){
        
        dd($request->puntuacion);
        //VALIDACION
        $this->validate($request, [
            'comentario' => 'required',
            'puntuacion' => 'required|max:5|min:1',
        ]);

        Post::create([
            'comentario' => $request->comentario,
            'puntuacion' => $request->puntuacion,
            'elemento_id' => $elemento->id,
            'user_id' => auth()->user()->id //Usamos el helper auth para coger el id de la persona autenticada
        ]);

        return redirect()->route('elementoprincipal.index', $elemento->id);
    }

    //borrar la reseña
    public function destroy(Post $post){
        $this->authorize('delete', $post);//Policy PostPolicy
        $post->delete();

        return redirect()->route('dashboard', auth()->user()->name);
    }
}
