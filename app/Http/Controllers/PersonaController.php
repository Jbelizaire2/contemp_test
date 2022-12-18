<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;


class PersonaController extends Controller
{
    //
    public function store(Request $request)
    {
         $request->validate( [
            'rut' => 'required|min:5|max:15',
            'nombre' => 'required|min:3|max:20',
            'apellidop' => 'required|min:3|max:20',
            'apellidom' => 'required|min:3|max:20',
            'correo' => 'required|email|max:20',
            'direccion' => 'required|min:10|max:50'
        ]);


        $data = array(
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellidop,
            'apellido_materno' => $request->apellidom,
            'rut' => $request->rut,
            'mail' => $request->correo,
            'direccion' => $request->direccion,

        );
        $persona = new Persona();
        $persona->fill($data);
        $persona->save();
        return redirect()->route('persona')->with('status', 'Ha registrado la persona de forma correcta');
       
    }

    
}
