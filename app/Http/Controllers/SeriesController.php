<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elemento;

class SeriesController extends Controller
{
    public function index(){
        $elementos = elemento::where('tipo_elemento', 1)->select('id')->paginate(10);//tipo serie 
        
        return view('secciones.series',[
            'elementos' => $elementos,
            ]);
    }
}
