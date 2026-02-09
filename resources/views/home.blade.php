@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
    <x-listar-post :posts="$posts">
        <x-slot:linksPaginar>
        </x-slot:linksPaginar>
        <x-slot:noPublicaciones>
            No hay publicaciones nuevas, sé el primero y haz una.
        </x-slot:noPublicaciones>
    </x-listar-post>
@endsection