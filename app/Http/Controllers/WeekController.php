<?php

namespace App\Http\Controllers;


use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WeekResource;

class WeekController extends Controller
{
    public function index()
    {
        $weeks = Week::all();

       /*  dd($plannings); */

        return response()
            ->json($weeks);
    }
    public function store(Request $request)
    {
        /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        $validator = Validator::make(/* $input */ $request->all(), [
            /* 'curricularunit'      => 'required|string|max:255|unique:plannings',
            'code'                => 'required|string|max:255|unique:plannings',
            'section'             => 'required|string|max:255', */
            /* 'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password', */
        ]);

        if($validator->fails()){
            return response()->json(['message', $validator->errors()], 422);
        }

        /* $input['password'] = bcrypt($input['password']); */
        /* $user = User::create($input); */

        $weeks = Week::create([
            'contenido'             => $request->contenido,
            'comp_esp'              => $request->comp_esp,
            'crit_desemp'           => $request->crit_desemp,
            'est_didac'             => $request->est_didac,
            'eval'                  => $request->eval,
            'rec_apren'             => $request->rec_apren,
            'biblio'                => $request->biblio,
            'plan_id'               => $request->plan_id
        ]);

        if ($weeks) {

            $success = [
                'Week' => $weeks,

            ];

            return response()->json([$success, 'Weeks registered successfully'], 201);
        }
    }


    public function show($id)
    {
        //Buscar el plan didactico
        $weeks = Week::findOrfail($id);
        if (!$weeks){
            return $weeks()->json([
                'message'=>'Weeks Not Found'
            ],404);
        }
        /* $courses = CourseResource::collection(Courses::with('user')->where('id',$id)->get()); */



        /* $weekz = WeekResource::collection(Week::with(['plan'])->where('id',$id)->get()); */
        /* $weekz = WeekResource::collection(Week::where('id',$id)->get()); */
        $weekz = WeekResource::collection(Week::with('plans')->where('id',$id)->get());

        //retornar el JSON
        return response()->json([
            'weeks' => $weeks,
            'weeks full' => $weekz
        ],200);
    }


    public function update(Request $request, $id)
    {
        //falta validacion //REVISAR LA DUPLICIDAD PARA  USERNAME Y EL EMAIL
        $validator = Validator::make(/* $input */ $request->all(), [
            /* 'username' => 'required|string|max:255|unique:users', */
            /* 'curricularunit'     => 'required|string|max:255', */
            /* 'email'    => 'required|string|email|max:255|unique:users', */
            /* 'password' => 'required|string|min:8' */

            /* 'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password', */
        ]);
        if($validator->fails()){
            return response()->json(['message', $validator->errors()], 422);
        }

        //PARA ACTUALIZAR FOTO //ejemplo de proyecto en laravel
        /* if ($request->hasFile('image')) {
            if ($user->image != null) {
                Storage::disk('images')->delete($user->image->path);
                $user->image->delete();
            }
            $user->image()->create([
                'path' => $request->image->store('users', 'images'),
            ]);
        } */

        $input = $request->all();

        //PARA ACTUALIZAR PASSWORD -
        /* $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $user = User::find($id);
            $user->password = $input['password'];
            $user->save();
        } */    /* else{
            $input = Arr::except($input, ['password']);
        }

        /* $data = Courses::find($id);
        $data->fill($request->except('password'));
        $data->save(); */

        $data = Week::find($id);
        $data->fill($request->all());
        $data->save();

        /* return response()->json($data, 200); */

        //Retornnando JSON
        return response()->json([
            'data: ' => $data,
            'message' => 'Week successfully update!.'
        ],200);
    }


    public function destroy($id)
    {
         //Detalles
         $week = Week::find($id);
         if(!$week){
             return response()->json([
                 'message'=>'Week not found!!'
             ],404);
         };

         //Borrar Usuario
         $week->delete();

         //Retornnando JSON
         return response()->json([
             'message' => 'Week successfully deleted.'
         ],200);

         /* return response()->json([
             'user active'=>$users,
         ],200); */
    }
}
