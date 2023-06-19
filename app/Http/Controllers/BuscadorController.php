<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;

class BuscadorController extends Controller
{
    public function index(Request $request){
        
        $busqueda = $request->search;

        $elementos = elemento::where('titulo', 'LIKE', '%' . $busqueda . '%')->select('id')->paginate(10);
        
        return view('buscador',[
            'elementos' => $elementos,
            ]);
    }
}
