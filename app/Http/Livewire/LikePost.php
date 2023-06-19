<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;

class LikePost extends Component
{

    public $post;
    public $isLiked;
    public $likes;
    
    //Mount es un constructor de Livewire
    public function mount($post){
        $this->isLiked = $post->checkLike(auth()->user());//comprobar si el usuario ya le ha dado like
        $this->likes = $post->likes->count();//cuenta la cantidad de likes
    }

    public function like(){

        //Si ya existe un like
        if ($this->post->checkLike(auth()->user())) {
            auth()->user()->likes()->where('post_id', $this->post->id)->delete();//Eliminar like
            
            //actualizar las variables de like
            $this->isLiked = false;
            $this->likes--;

        //Si no existe un like
        }else{
            $this->post->likes()->create([ //Crear like
                'user_id' => auth()->user()->id
            ]);

            //actualizar las variables de like
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render(){
        return view('livewire.like-post');
    }
}
