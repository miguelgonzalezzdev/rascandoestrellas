<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;

class VideojuegosController extends Controller
{
    public function index(){
        $elementos = elemento::where('tipo_elemento', 3)->select('id')->paginate(10);//tipo videojuego

        return view('secciones.videojuegos',[
            'elementos' => $elementos,
            ]);
    }
}
