<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;

class PeliculasController extends Controller
{
    public function index(){
        $elementos = elemento::where('tipo_elemento', 2)->select('id')->paginate(10);//tipo pelicula

        return view('secciones.peliculas',[
            'elementos' => $elementos,
            ]);
    }
}
