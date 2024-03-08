<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::all();

        return response()
            ->json($courses);
    }

    public function store(Request $request)
    {
        /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        $validator = Validator::make(/* $input */ $request->all(), [
            'name'      => 'required|string|max:255|unique:courses',
            'code'      => 'required|string|max:255|unique:courses',
            'section'   => 'required|string|max:255',
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

        $course = Courses::create([
            'name'       => $request->name,
            'code'       => $request->code,
            'section'    => $request->section,
        ]);

        if ($course) {
            /* $authHandler = new AuthHandler;
            $token = $authHandler->GenerateToken($user); */

            $success = [
                'course' => $course,
                /* 'token' => $token, */
            ];

            return response()->json([$success, 'Course registered successfully'], 201);
        }
    }

    public function show($id)
    {
        //Buscar el curso
        $course = Courses::findOrfail($id);
        if (!$course){
            return $course()->json([
                'message'=>'Course Not Found'
            ],404);
        }

        //retornar el JSON
        return response()->json([
            'course' => $course
        ],200);
    }

    public function update(Request $request, $id)
    {
        //falta validacion //REVISAR LA DUPLICIDAD PARA  USERNAME Y EL EMAIL
        $validator = Validator::make(/* $input */ $request->all(), [
            /* 'username' => 'required|string|max:255|unique:users', */
            'name'     => 'required|string|max:255',
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

        $data = Courses::find($id);
        $data->fill($request->all());
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        //Detalles
        $course = Courses::find($id);
        if(!$course){
            return response()->json([
                'message'=>'Course not found!!'
            ],404);
        };

        //Borrar Usuario
        $course->delete();

        //Retornnando JSON
        return response()->json([
            'message' => 'Course successfully deleted.'
        ],200);

        /* return response()->json([
            'user active'=>$users,
        ],200); */
    }
}
