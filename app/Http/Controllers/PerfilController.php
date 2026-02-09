<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);
        
        $this->validate($request, [
            'username' => [
                'required', 
                'min:3', 
                'max:20',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)
                ]
        ]);

        if($request->imagen){
            $imagen= $request->file('imagen');
            $nombreImagen= Str::uuid() . "." . $imagen->extension();

            $path=public_path('perfiles');
            if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true);
                }
            $imagenServidor= Image::read($imagen);
            $imagenServidor->cover(1000, 1000);
            $imagenPath= $path . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $usuario= User::find(Auth::user()->id);
        $usuario->username= $request->username;
        $usuario->imagen= $nombreImagen ?? Auth::user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('post.index', $usuario->username);
    }


}
