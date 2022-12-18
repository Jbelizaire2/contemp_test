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
        $id=request()->route('id');
        $result =Comentarios::where("post_id",$id)->get();
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
            'name' => 'required',
            'email' => 'required',
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
                'post_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body,
              );
             // return $data;

                $comentario= new Comentarios();
                $comentario->fill($data);
                $comentario->save();

                  return response()->json([
                    "message" =>" El Comentario fue creado correctamente"
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
    public function show($idc)
    {
      $id=request()->route('id');
      $idc=request()->route('idc');
        $result= Comentarios::where('post_id',$id)->where('id',$idc)->get();
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
    public function update(Request $request, $idc)
    {
        $id=request()->route('id');
        $idc=request()->route('idc');

        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }
        $result= Comentarios::where('post_id',$id)->where('id',$idc)->get();
            if(count($result)>0){
                $validator = \Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required',
                    'body' => 'required|string|min:30',

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
                        'post_id' => $id,
                        'name' => $request->name,
                        'email' => $request->email,
                        'body' => $request->body,
                      );
                 $coment = Comentarios::where('id', $idc)->update($data);
                 $comentdatos = Comentarios::find($idc);

                return response()->json($comentdatos, 200);
                }
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idc)
    {
        $id=request()->route('id');
        $idc=request()->route('idc');
        if (!intval($id)){

            return response()->json([
                "message" =>" Parametro recibe solo numero intero!"
              ], 422);
        }else{
             $result =Comentarios::where('post_id',$id)->where('id',$idc)->get();
            if (count($result)>0){
                $comentario = Comentarios::find($idc)->delete();
                return response()->json([
                    "message" =>" Comentario eliminado con exito!"
                  ], 200);

            }else{
                return response()->json([
                    "message" =>" Comentario no existe!"
                  ], 404);
            }
            
        }
    }
}
