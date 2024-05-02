<?php

namespace App\Http\Controllers;

use App\Models\Plan_unit;
use App\Models\Plans;
use Illuminate\Http\Request;
use App\Http\Resources\PlanUnitResource;
use Illuminate\Support\Facades\Validator;

class PlanUnitController extends Controller
{
    public function index()
    {
        $plans = Plan_unit::all();

       /*  dd($plannings); */

        return response()
            ->json($plans);
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

        $plans = Plan_unit::create([

            'unit'              => $request->unit,
            'comp_esp'          => $request->comp_esp,
            'crit_desemp'       => $request->crit_desemp,
            'planning_id'       => $request->planning_id
        ]);

        if ($plans) {


            $success = [
                'plans' => $plans,

            ];

            return response()->json([$success, 'Plans registered successfully'], 201);
        }
    }


    public function show($id)
    {
        //Buscar el plan didactico
        $plans = Plan_unit::findOrfail($id);
        if (!$plans){
            return $plans()->json([
                'message'=>'PlanUnits Not Found'
            ],404);
        }
        /* $courses = CourseResource::collection(Courses::with('user')->where('id',$id)->get()); */

        $planz = PlanUnitResource::collection(Plan_unit::with(['plans'])->where('id',$id)->get());
        /* $planz = $id; */

        /* $planzz = $plans->units();

        dd($planzz); */

        /* $planz = $plans->units(); */

        //retornar el JSON
        return response()->json([
            'planunits' => $plans,
            'planunits full' => $planz
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

        $data = Plans::find($id);
        $data->fill($request->all());
        $data->save();

        return response()->json($data, 200);
    }


    public function destroy($id)
    {
         //Detalles
         $plan = Plans::find($id);
         if(!$plan){
             return response()->json([
                 'message'=>'Planning not found!!'
             ],404);
         };

         //Borrar Usuario
         $plan->delete();

         //Retornnando JSON
         return response()->json([
             'message' => 'Plan successfully deleted.'
         ],200);

         /* return response()->json([
             'user active'=>$users,
         ],200); */
    }
}
