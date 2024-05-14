<?php

namespace App\Http\Controllers;


use App\Models\Plans;
use App\Models\Planning;
use App\Models\Plan_unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlanResource;
use App\Http\Resources\PlanningResource;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plans::all();

       /*  dd($plannings); */

        return response()
            ->json($plans);
    }
    public function store(Request $request)
    {
        /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        /* return response()->json([$request->all(), 'Datos en entrada del api'], 201); */

        $idPlanning = $request->idPlanning        ;
        /* dd($idPlanning); */
        $planning = PlanningResource::collection(Planning::with(['plans'])->where('id',$idPlanning)->get())->first();
        /* dd($planning); */
        $plan = $planning->plans->where('unit',$request->unit)->first();
        /* return response()->json([$request->unit, 'Datos en entrada del api'], 201); */
        /* $plan_unit_id = strval($plan->plan_unit_id); */
        $plan_unit_id = $plan->plan_unit_id;
        /* return response()->json([$plan_unit_id, 'Datos en entrada del api'], 201); */
        /* dd($plan_unit_id); */
        /* $plan_unit = Plan_unit::where('id', $plan_unit_id)->first(); */ //no se usa aqui

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

        /* return response()->json([strval($plan_unit_id2), 'Datos en entrada del api'], 201); */

        $plans = Plans::create([

            'unit'              => $request->unit,
            /* 'comp_esp'          => $request->comp_esp, */
            /* 'crit_desemp'       => $request->crit_desemp, */
            'est_eva'           => $request->est_eva,
            'inst_eva'          => $request->inst_eva,
            'tip_eva'           => $request->tip_eva,
            'evid_eva'          => $request->evid_eva,
            'retro'             => $request->retro,
            'lapso'             => $request->lapso,
            'ponderacion'       => $request->ponderacion,
            /* 'unit_id'           => $request->unit_id, */
            'planning_id'       => $request->idPlanning,
            'plan_unit_id'      => $plan_unit_id
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
        $plans = Plans::findOrfail($id);
        if (!$plans){
            return $plans()->json([
                'message'=>'Plans Not Found'
            ],404);
        }
        /* $courses = CourseResource::collection(Courses::with('user')->where('id',$id)->get()); */

        $planz = PlanResource::collection(Plans::with(['weeks'])->where('id',$id)->get());
        /* $planz = $id; */

        /* $planzz = $plans->units();

        dd($planzz); */

        /* $planz = $plans->units(); */

        //retornar el JSON
        return response()->json([
            'plans' => $plans,
            'plans full' => $planz
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
