<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class ResenaElementoPrincipal extends Component
{

    public $post_id;

    public function render()
    {
        $post_id = $this->post_id;

        $post = Post::where('id',$post_id)->get();

        //Seleccionamos el user_id de la reseña para buscar a su usuario
        foreach ($post as $post_item) {
            $user = User::where('id',$post_item->user_id)->get();
        }

        //seleccionamos el nombre del usuario
        foreach ($user as $user_item) {
            $user_name = $user_item->name;
        }

        return view('livewire.resena-elemento-principal',[
            'post' => $post,
            'user_name' => $user_name
        ]);
    }
}
