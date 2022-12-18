@extends('layouts.app')

@section('content')
<template>

<div class="container">
    <div class="col d-flex justify-content-center ">
        <div class="col-md-12">
            <div class="card border-primary mb-3" >
                <div class="card-header">{{ __('PERSONAS') }}</div>

                <div class="card-body">
                  

                    <form id="basic-form" action="{{ route('persona.registrar') }}" method="POST" class="form-horizontal"  >
                    {{ csrf_field() }}
  <div class="flex flex-wrap -mx-3 mb-6">

  <!--!Fila triple columnas -->
  

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        RUT
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="rut" type="text" placeholder="11.111111-1" name="rut" required>
      @if ($errors->has('rut'))
      <p class="text-red-500 text-xs italic">Por favor ingrese el rut.  {{ $errors->first('rut') }}</p>
      @endif
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Nombres
      </label>
      <div class="relative">
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombre" type="text" placeholder="" name="nombre" required>
      @if ($errors->has('nombre'))
      <p class="text-red-500 text-xs italic">Por favor ingrese el nombre. {{ $errors->first('nombre') }}</p>
      @endif
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Apellido Paterno
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="apellidop" type="text" placeholder="" name="apellidop" required>
      @if ($errors->has('apellidop'))
      <p class="text-red-500 text-xs italic">Por favor ingrese el apellido materno. {{ $errors->first('apellidop') }}</p>
      @endif
    </div>
  

  <!--!Fin fila triplecolumnas -->
  <!--!Inicio Fila doblecolumnas -->
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Apellido Materno
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="apellidom" type="text" placeholder="" name="apellidom">
      @if ($errors->has('apellidom'))
      <p class="text-red-500 text-xs italic">Por favor ingrese el apellido materno. {{ $errors->first('apellidom') }}</p>
      @endif
    </div>


    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Correo
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="correo" type="email" placeholder="" name="correo" required>
      @if ($errors->has('correo'))
      <p class="text-red-500 text-xs italic">Por favor ingrese el correo. {{ $errors->first('correo') }}</p>
      @endif
    </div>

  </div>

<!--!Fin Fila doblecolumnas -->

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Direcciòn
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" type="text" placeholder="******************" name="direccion" required>
      @if ($errors->has('direccion'))
      <p class="text-red-500 text-xs italic">Por favor ingrese la direcciòn. {{ $errors->first('direccion') }}</p>
      @endif
    </div>
  </div>
  
  <div class="flex items-center justify-center">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Guardar
      </button>
   &nbsp;
  <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"href="{{ url('/home') }}" role="button">Volver</a>

    </div>
  
</form>

@if (session('status'))
    <p>{{ session('status') }}</p>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">{{ session('status') }}</strong>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>
@endif
                </div>
            </div>
        </div>


    </div>

    
</div>
</template>

@endsection
<script>

</script>