<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\elemento;
use App\Models\Post;

class ElementoHome extends Component
{

    public $id_elemento;

    public function render()
    {
        $id_elemento = $this->id_elemento;
        $data = json_decode($id_elemento);
        $id = $data->id;
        
        $elemento = elemento::where('id',$id)->get();

        foreach($elemento as $item){
            $elementoId = $item->id;
        }

        $puntuacion = Post::where('elemento_id', $elementoId)->pluck('puntuacion')->sum();
        $totalPosts = Post::where('elemento_id', $elementoId)->count();
        $totalPuntuacion = $totalPosts > 0 ? $puntuacion / $totalPosts : 0;

        return view('livewire.elemento-home',[
            'elemento' => $elemento,
            'totalPuntuacion' => $totalPuntuacion
        ]);
    }
}
