<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Comentarios;
use App\Models\Publicaciones;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if (empty($_GET)){

        $result =User::select('id', 'name AS nombre', 'email','genero', 'activo')->get();
        if (count($result) != 0) {
            return response($result, 200);
        } else {
            return response()->json([
           "message" =>" No Existe nigún registro"
         ], 404);
        }
       }else{
         $nombre=$request->has('nombre');
        $mail=$request->has('email');
        $activo=$request->has('activos');
        if ($nombre==true){
            $result =User::select('id', 'name AS nombre', 'email','genero', 'activo')->where('name', $request->nombre)->get();
            if (count($result) != 0) {
                return response($result, 200);
            } else {
                return response()->json([
               "message" =>" No Existe nigún registro en nuestra busqueda por ".$request->nombre
             ], 404);
            }

        }else  if ($mail==true){
            
            $result =User::select('id', 'name AS nombre', 'email','genero', 'activo')->where('email', $request->email)->get();
            if (count($result) != 0) {
                return response($result, 200);
            } else {
                return response()->json([
               "message" =>" No Existe nigún registro en nuestra busqueda por ".$request->email
             ], 404);
            }

        }else  if ($activo==true){
            $result =User::select('id', 'name AS nombre', 'email','genero', 'activo')->where('activo', $request->activos)->get();
            if (count($result) != 0) {
                return response($result, 200);
            } else {
                return response()->json([
               "message" =>" No Existe nigún registro en nuestra busqueda por ".$request->activos
             ], 404);
            }

        }else{
            return response()->json([
                "message" =>" Recurso no disponible"
              ], 422);
           }


       }


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
            'nombre' => 'required|string|min:10',
            'email' => 'required|email',
            'genero' => 'required',
            'activo' => 'required',

        ]);

    if ($validator->fails()) {


            return response()->json($validator->errors());
        }else{
            $result =User::where('email', "$request->email")->get();
            if(count($result)>0){
                return response()->json([
                    "message" =>" El Usuario ya se encuentra registrado"
                  ], 200);
            }
            if ($request->activo==0){
                $act="false";
            }else{
                $act="true";
            }
            $data = array(
                'name' => $request->nombre,
                'email' => $request->email,
                'genero' => $request->genero,
                'activo' => $act,
                'password' => Hash::make("123456"),
                'api_token' => Hash::make("123456"),
              );

                $usuario= new User();
                $usuario->fill($data);
                $usuario->save();

                  return response()->json([
                    "message" =>" El usuario fue ingresado correctamente"
                  ], 200);
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $users)
    {
        $id=request()->route('id');


        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }
           $result =User::where('id', $id)->get();
            if(count($result)>0){
                $validator = \Validator::make($request->all(), [
                    'nombre' => 'required|string|min:10',
                    'email' => 'required|email',
                    'genero' => 'required',
                    'activo' => 'required',

                ]);

            if ($validator->fails()) {


                    return response()->json($validator->errors());
                }else{
                    if ($request->activo==0){
                        $act="false";
                    }else{
                        $act="true";
                    }
               $data = array(
                    'name' => $request->nombre,
                    'email' => $request->email,
                    'genero' => $request->genero,
                    'activo' => $act,
                  );
                 $user = User::where('id', $id)->update($data);
                 $userdatos = User::find($id);

                return response()->json($userdatos, 200);
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $id=request()->route('id');
        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }else{
            $result =User::where('id', $id)->get();
            if ($result>0){

                $result1 =Publicaciones::where('user_id', $id)->get();
                $result2 =Comentarios::where('post_id', $id)->get();
                if (count($result1)==0 && count($result2)==0){
                 $user = User::find($id)->delete();
                 return response()->json([
                    "message" =>" Usuario eliminado con exito!"
                  ], 200);
                }else{
                    return response()->json([
                        "message" =>"Uff Usuario tiene algunos comentarios o publicaciones relacionadas!"
                      ], 200);  
                }
            }
            return response()->json($result, 200);
        }


    }
    public function update1(Request $request, User $email)
    {
            $email = $request->get('email');
            $result =User::where('email', $email)->get();
            if(count($result)>0){
                $validator = \Validator::make($request->all(), [
                    'nombre' => 'required|string|min:10',
                    'email' => 'required|email',
                    'genero' => 'required',
                    'activo' => 'required',

                ]);

            if ($validator->fails()) {


                    return response()->json($validator->errors());
                }else{
                    if ($request->activo==0){
                        $act="false";
                    }else{
                        $act="true";
                    }
                $data = array(
                    'name' => $request->nombre,
                    'email' => $request->email,
                    'genero' => $request->genero,
                    'activo' => $act,
                  );
                  //return $data;
                 $user = User::where('email', $email)->update($data);
                 $userdatos = User::where('email',$email)->get();

                return response()->json($userdatos, 200);
                }
            }
    }

}
