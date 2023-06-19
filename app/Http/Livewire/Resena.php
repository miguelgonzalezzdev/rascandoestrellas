<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\elemento;

class Resena extends Component
{

    public $post_id;

    public function render()
    {
        $post_id = $this->post_id;

        $post = Post::where('id',$post_id)->get();

        //Seleccionamos el user_id de la reseña para buscar a su usuario
        foreach ($post as $post_item) {
            $user = User::where('id',$post_item->user_id)->get();
            //$elemento = elemento::where('id',$id)->get();
            $elemento = elemento::where('id',$post_item->elemento_id)->get();
        }

        //seleccionamos el nombre del usuario
        foreach ($user as $user_item) {
            $user_name = $user_item->name;
            $user_id = $user_item->id;
        }

        foreach ($elemento as $elemento_item) {
            $elemento_titulo = $elemento_item->titulo;//obtener el nombre del elemento
            $elemento_id = $elemento_item->id;//obtener el id del elemento
        }

        return view('livewire.resena',[
            'post' => $post,
            'user_name' => $user_name,
            'user_id' => $user_id,
            'elemento_titulo' => $elemento_titulo,
            'elemento_id' => $elemento_id
        ]);
    }
}
