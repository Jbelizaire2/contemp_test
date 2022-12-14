<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comentarios;
class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result =Comentarios::all();
        if (count($result) != 0) {
            return response($result, 200);
        } else {
            return response()->json([
           "message" =>" No Existe nigún registro"
         ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'descripcion' => 'required|string|min:30',
            'user_id' => 'required',
            'status' => 'required',
           
        ]);
    
    if ($validator->fails()) {
            
   
            return response()->json($validator->errors());
        }else{
            $result =User::where('id', "$request->user_id")->get();
            if(count($result)==0){
                return response()->json([
                    "message" =>" El Usuario no existe"
                  ], 200);
            }
            if ($request->activo==0){
                $act="false";
            }else{
                $act="true";
            }
            $data = array(
                'user_id' => $request->user_id,
                'descripcion' => $request->descripcion,
                'staus' => $act,
              );
              //return $data;
    
                $comentario= new Comentarios();
                $comentario->fill($data);
                $comentario->save();

                  return response()->json([
                    "message" =>" El usuario fue ingresado correctamente"
                  ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $result =Comentarios::find($id);
        if ($result) {
            return response($result, 200);
        } else {
            return response()->json([
           "message" =>" No Existe nigún registro"
         ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
