<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\VideojuegosController;
use App\Http\Controllers\ElementoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuscadorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

//PAGINA PRINCIPAL
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//BUSCADOR
Route::get('/buscador', [BuscadorController::class, 'index'])->name('buscador.index');

//SECCIONES
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/peliculas', [PeliculasController::class, 'index'])->name('peliculas.index');
Route::get('/videojuegos', [VideojuegosController::class, 'index'])->name('videojuegos.index');

//RUTAS PROTEGIDAS PARA USUARIOS CON PERMISOS DE ADMINISTRACIÓN
Route::middleware(['auth', 'gestion'])->group(function () {
    //LISTADO CRUD
    Route::get('/gestion', [ElementoController::class, 'show'])->name('gestion.index');

    //IR A CREAR ELEMENTO
    Route::get('/gestion/crear', [ElementoController::class, 'create'])->name('gestion.create');

    //CREAR ELEMENTO
    Route::post('/gestion/guardar', [ElementoController::class, 'store'])->name('gestion.store');

    //BORRAR ELEMENTO
    Route::delete('/gestion/eliminar/{elemento:id}', [ElementoController::class, 'destroy'])->name('gestion.destroy');

    //IR A EDITAR ELEMENTO
    Route::get('/gestion/editar/{elemento:id}', [ElementoController::class, 'edit'])->name('gestion.edit');

    //EDITAR ELEMENTO
    Route::patch('/gestion/edicion/{elemento:id}', [ElementoController::class, 'update'])->name('gestion.update');

});

Route::middleware('auth')->group(function () {

    //EDITAR PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //CREAR RESEÑA
    Route::post('/contenido/crear-reseña/{elemento:id}', [PostController::class, 'store'])->name('post.store');

    //BORRAR RESEÑA
    Route::delete('/contenido/reseña/borrar/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    //IR A RESEÑA
    Route::get('/contenido/reseña/{elemento:id}', [PostController::class, 'create'])->name('post.create');

    //DAR LIKE A UNA RESEÑA
    Route::post('/contenido/reseña/{post}/likes', [LikeController::class, 'store'])->name('likes.store');

    //ELIMINAR LIKE DE UNA RESEÑA
    Route::delete('/contenido/reseña/{post}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');
});

//IR A UN ELEMENTO
Route::get('/contenido/{elemento:id}', [ElementoController::class, 'index'])->name('elementoprincipal.index');

//IR AL PERFIL
Route::get('/{user:name}', [ProfileController::class, 'index'])->name('dashboard'); //Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
