<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;


class ImagenController extends Controller
{
    public function store(Request $request){
        $imagen= $request->file('file');
        $nombreImagen= Str::uuid() . "." . $imagen->extension();

        $path=public_path('uploads');
        if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);
            }
        $imagenServidor= Image::read($imagen);
        $imagenServidor->cover(1000, 1000);
        $imagenPath= $path . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(['imagen'=> $nombreImagen]);
    }
}
