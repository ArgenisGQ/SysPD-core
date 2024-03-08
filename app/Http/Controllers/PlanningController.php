<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Database\Seeders\PlanningSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanningController extends Controller
{

    public function index()
    {
        $plannings = Planning::all();

        return response()
            ->json($plannings);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        $validator = Validator::make(/* $input */ $request->all(), [
            'curricularunit'      => 'required|string|max:255|unique:courses',
            'code'                => 'required|string|max:255|unique:courses',
            'section'             => 'required|string|max:255',
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

        $planning = Planning::create([
            'curricularunit'       => $request->name,
            'code'                 => $request->code,
            'section'              => $request->section,
        ]);

        if ($planning) {
            /* $authHandler = new AuthHandler;
            $token = $authHandler->GenerateToken($user); */

            $success = [
                'planning' => $planning,
                /* 'token' => $token, */
            ];

            return response()->json([$success, 'Planning registered successfully'], 201);
        }
    }


    public function show($id)
    {
        //Buscar el plan didactico
        $planning = Planning::findOrfail($id);
        if (!$planning){
            return $planning()->json([
                'message'=>'Planning Not Found'
            ],404);
        }

        //retornar el JSON
        return response()->json([
            'planning' => $planning
        ],200);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //falta validacion //REVISAR LA DUPLICIDAD PARA  USERNAME Y EL EMAIL
        $validator = Validator::make(/* $input */ $request->all(), [
            /* 'username' => 'required|string|max:255|unique:users', */
            'curricularunit'     => 'required|string|max:255',
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

        $data = Planning::find($id);
        $data->fill($request->all());
        $data->save();

        return response()->json($data, 200);
    }


    public function destroy($id)
    {
         //Detalles
         $planning = Planning::find($id);
         if(!$planning){
             return response()->json([
                 'message'=>'Planning not found!!'
             ],404);
         };

         //Borrar Usuario
         $planning->delete();

         //Retornnando JSON
         return response()->json([
             'message' => 'Planning successfully deleted.'
         ],200);

         /* return response()->json([
             'user active'=>$users,
         ],200); */
    }
}
