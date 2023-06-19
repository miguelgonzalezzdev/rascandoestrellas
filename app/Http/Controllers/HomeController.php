<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;

class HomeController extends Controller
{
    public function index(){

        $series_elementos = elemento::where('tipo_elemento', 1)->inRandomOrder()->select('id')->limit(4)->get();
        $peliculas_elementos = elemento::where('tipo_elemento', 2)->inRandomOrder()->select('id')->limit(4)->get();
        $juegos_elementos = elemento::where('tipo_elemento', 3)->inRandomOrder()->select('id')->limit(4)->get();

        $year = date('Y'); //Obtener año actual
        $novedades_elementos = elemento::where('fecha_lanzamiento', $year)->inRandomOrder()->select('id')->limit(10)->get();

        return view('welcome',[
            'series_elementos' => $series_elementos,
            'peliculas_elementos' => $peliculas_elementos,
            'juegos_elementos' => $juegos_elementos,
            'novedades_elementos' => $novedades_elementos,
            ]);
    }
}
