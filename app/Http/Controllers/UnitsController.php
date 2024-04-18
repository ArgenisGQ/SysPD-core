<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UnitResource;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Units::all();

       /*  dd($plannings); */

        return response()
            ->json($units);
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

        $units = Units::create([
            'contenido'             => $request->contenido,
            'comp_esp'              => $request->comp_esp,
            'crit_desemp'           => $request->crit_desemp,
            'est_didac'             => $request->est_didac,
            'eval'                  => $request->eval,
            'rec_apren'             => $request->rec_apren,
            'biblio'                => $request->biblio,
            'plan_id'               => $request->plan_id
        ]);

        if ($units) {
            
            $success = [
                'units' => $units,

            ];

            return response()->json([$success, 'Units registered successfully'], 201);
        }
    }


    public function show($id)
    {
        //Buscar el plan didactico
        $units = Units::findOrfail($id);
        if (!$units){
            return $units()->json([
                'message'=>'Units Not Found'
            ],404);
        }
        /* $courses = CourseResource::collection(Courses::with('user')->where('id',$id)->get()); */
        $units = UnitResource::collection(Units::with('plan')->where('id',$id)->get());

        //retornar el JSON
        return response()->json([
            'units' => $units,
            'units full' => $units
        ],200);
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

        $data = Units::find($id);
        $data->fill($request->all());
        $data->save();

        return response()->json($data, 200);
    }


    public function destroy($id)
    {
         //Detalles
         $unit = Units::find($id);
         if(!$unit){
             return response()->json([
                 'message'=>'unit not found!!'
             ],404);
         };

         //Borrar Usuario
         $unit->delete();

         //Retornnando JSON
         return response()->json([
             'message' => 'Unit successfully deleted.'
         ],200);

         /* return response()->json([
             'user active'=>$users,
         ],200); */
    }
}
