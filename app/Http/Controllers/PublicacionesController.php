<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Publicaciones;
class PublicacionesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=request()->route('id');
        $result =Publicaciones::where("user_id",$id)->get();
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
        $token = $request->header('Authorization');
        if(!empty($token)) {
          $apiToken = str_replace("Bearer", "", $token);

         $user = User::where('api_token',"$apiToken")->toSql();

         $validator = \Validator::make($request->all(), [
             'titulo' => 'required',
             'body' => 'required|string|min:30',
         ]);
         $id=request()->route('id');

     if ($validator->fails()) {


             return response()->json($validator->errors());
         }else{

              $result =User::where('id', $id)->get();
             if(count($result)==0){
                 return response()->json([
                     "message" =>" El Usuario no existe"
                   ], 200);
             }



             $data = array(
                 'user_id' => $id,
                 'titulo' => $request->titulo,
                 'body' => $request->body,
               );
               //return $data;

                 $publicacion= new Publicaciones();
                 $publicacion->fill($data);
                 $publicacion->save();

                   return response()->json([
                     "message" =>" La Publicidad fue creado correctamente"
                   ], 200);
         }
     }   else{
         return response()->json(['error' => 'El token es aubligatorio'], 401, []);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idp)
    {
        $id=request()->route('id');
        $idp=request()->route('idp');
          $result= Publicaciones::where('user_id',$id)->where('id',$idp)->get();
          if (count($result)>0) {
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
    public function update(Request $request, $idp)
    {
        $id=request()->route('id');
        $idp=request()->route('idp');

        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }
        $result= Publicaciones::where('user_id',$id)->where('id',$idp)->get();
            if(count($result)>0){
                $validator = \Validator::make($request->all(), [
                    'titulo' => 'required',
                    'body' => 'required|string|min:30',

                ]);

            if ($validator->fails()) {


                    return response()->json($validator->errors());
                }else{

                    $data = array(
                        'user_id' => $id,
                        'titulo' => $request->titulo,
                        'body' => $request->body,
                      );
                 $pub = Publicaciones::where('id', $idp)->update($data);
                 $pubdatos = Publicaciones::find($idp);

                return response()->json($pubdatos, 200);
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idp)
    {

        $id=request()->route('id');
        $idp=request()->route('idp');
        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }else{
            $result =Publicaciones::where('user_id',$id)->where('id',$idp)->get();
            if (count($result)>0){
                $publicacion = Publicaciones::find($idp)->delete();
                return response()->json([
                    "message" =>" Publicacion eliminado con exito!"
                  ], 200);

            }else{
                return response()->json([
                    "message" =>" Publicacion no existe!"
                  ], 404);
            }
               }
    }
}
