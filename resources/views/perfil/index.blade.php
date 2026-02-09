@extends('layouts.app')

@section('titulo')
    Editar perfil
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de usuario
                    </label>
                    <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu nombre de usuario nuevo"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('name')}}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p> 
                    @enderror
                </div>                
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Foto de perfil
                    </label>
                    <input 
                    id="imagen"
                    name="imagen"
                    type="file"
                    class="border p-3 w-full rounded-lg "
                    value="{{old('name')}}"
                    accept=".jpg, .jpeg, .png"
                    />
                </div>         
                <input
                    type="submit"
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />       
            </form>
        </div>
    </div>
@endsection