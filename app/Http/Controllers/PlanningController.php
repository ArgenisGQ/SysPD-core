<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Database\Seeders\PlanningSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlanningResource;
use App\Models\Plan_unit;
use App\Models\Plans;

class PlanningController extends Controller
{

    public function index()
    {
        $plannings = Planning::all();

       /*  dd($plannings); */

        return response()
            ->json($plannings);
    }


    public function store(Request $request)
    {
        /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        $user_act = auth('api')->user()->id;

        $validator = Validator::make(/* $input */ $request->all(), [
            'curricularunit'      => 'required|string|max:255|unique:plannings',
            'code'                => 'required|string|max:255|unique:plannings',
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
            'curricularunit'       => $request->curricularunit,
            'code'                 => $request->code,
            'section'              => $request->section,
            'period'               => $request->period,
            'modalidad'            => $request->modalidad,
            'user_id'              => $user_act
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
        /* $courses = CourseResource::collection(Courses::with('user')->where('id',$id)->get()); */
        /* $plannings = PlanningResource::collection(Planning::with(['plans','weeks'])->where('id',$id)->get())->first(); */
        $plannings = PlanningResource::collection(Planning::with(['plans','weeks'])->where('id',$id)->get());
        //retornar el JSON
        return response()->json([
            'planning basic' => $planning,
            'planning' => $plannings
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

        $planning = PlanningResource::collection(Planning::with(['plans'])->where('id',$id)->get())->first();

        $planning2 = PlanningResource::collection(Planning::with(['plans'])->where('id',$id)->get())->first();

        //form01
        if ($request->step == 1) {
            /* return response()->json([
                'message'=>'ready!'
            ],200); */

            //validaciones

           /*  $planning = PlanningResource::collection(Planning::with(['plans'])->where('id',$id)->get())->first();
 */
            $data = $planning;
            $data->fill($request->all());
            $data->save();
            //para guardar solamente el campo de proposito
            $output = $planning ->course->synoptic->update([
                'purpose' => $request->purpose
            ]);
            /* $data->save(); */

            return response()->json($data, 200);

        };

        //form02
        if ($request->step == 2) {
            /* return response()->json([
                'message'=>'ready!'
            ],200); */

            //validaciones

            /* $planning = PlanningResource::collection(Planning::with(['plans'])->where('id',$id)->get())->first(); */

            //para guardar en usuarios
            $userOut = $planning ->user->update([
                'username' => $request->username,
                'idcard'   => $request->idcard,
                'phone'    => $request->phone,
                'email'    => $request->email
            ]);

            //para guardar en cursos
            $courseOut = $planning ->course->update([
                'h_clases'  => $request->h_clases,
                'h_tutoria' => $request->h_tutoria,
                'h_total'   => $request->h_total
            ]);


            return response()->json([
                'user'  => $userOut,
                'course'=> $courseOut
            ], 200);

        };

        //form03
        if ($request->step == 3) {
            /* return response()->json([
                'message'=>'ready!'
            ],200); */

            //validaciones

            /* $planning = PlanningResource::collection(Planning::with(['plans'])->where('id',$id)->get())->first(); */

            /* $data = $planning;
            $data->fill($request->all());
            $data->save(); */
            //para guardar solamente el campo de proposito
            /* $output = $planning ->course->synoptic->update([
                'purpose' => $request->purpose
            ]); */
            /* $data->save(); */

            /* return response()->json($data, 200); */

            //para guardar en cursos
            $courseOut = $planning ->course->update([
                'name'       => $request->name,
                'unit01'     => $request->unit01,
                'unit02'     => $request->unit01,
                'unit03'     => $request->unit01,
                'unit04'     => $request->unit01,
                'unitTotal'  => $request->unitTotal,
            ]);


            return response()->json([
                /* 'user'  => $userOut, */
                'course'=> $courseOut
            ], 200);

        };

        //form04
        if ($request->step == 4) {

            $plan = $planning->plans->where('unit',$request->unit)->first();
            $plan_unit_id  = $plan->plan_unit_id;
            $plan_unit = Plan_unit::where('id', $plan_unit_id)->first();
            $plan_unit_update = $plan_unit->update([
                'comp_esp'     => $request->comp_esp,
                'crit_desemp'  => $request->crit_desemp,
            ]);

            return response()->json([
                /* 'user'  => $userOut, */
                /* 'plan id' => $plan,
                'id plan' => $plan_unit_id ,
                'response test into'=> $plan_unit, */
                'plan unit update'   => $plan_unit_update
            ], 200);

        };




        return response()->json([
                'message'=>'no data!'
            ],404);
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
