<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Post;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('users', 'name')->ignore(auth()->user()),
                'min:3', 
                'max:25',
                'not_in:' . implode(',',config('palabras_reservadas.palabras')),
                ]
        ]);

        //Si se ha seleccionado una imagen
        if($request->imagen){
            $imagen=$request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();//crea un id unico

            $imagenServidor=Image::make($imagen);//crear instancia de la imagen
            $imagenServidor->fit(1000,1000);//fijar relacion de acpecto

            $imagenPath=public_path('perfiles').'/'.$nombreImagen;//ruta donde se guarda el archivo
            $imagenServidor->save($imagenPath);
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        //guardar cambios 
        $usuario=User::find(auth()->user()->id);
        $usuario->name = $request->name;
        if($request->imagen){
            $usuario->imagen = $nombreImagen ?? '';
        }
        $usuario->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    
    /**
     * Ir al perfil de usuario
     */
    public function index(User $user){

        $posts = Post::where('user_id', $user->id)->pluck('id'); 

        return view('dashboard', [
            'user' => $user, //pasamos la informacion del usuario
            'posts' => $posts
        ]);
    }
}
