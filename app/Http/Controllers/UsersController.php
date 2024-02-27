<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Handlers\Admin\AuthHandler;
use App\Models\User;
use Firebase\JWT\JWT;
use DateTimeImmutable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        /* $users = ([
            'username'         => 'username',
            'name'             => 'name,',
            'email'            => 'email',
        ]); */

        /* dd($users); */

        /* return $users; */

        /* return response()
            ->json([
                'username'         => $users->username,
                'name'             => $users->name,
                'email'            => $users->email,
            ]); */

        return response()
            ->json($users);

        /* return $users; */
    }

    //Registrar usuarios
    public function store(Request $request)
    {
         /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

         $validator = Validator::make(/* $input */ $request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
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

        $user = User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $authHandler = new AuthHandler;
            $token = $authHandler->GenerateToken($user);

            $success = [
                'user' => $user,
                'token' => $token,
            ];

            return response()->json([$success, 'user registered successfully'], 201);
        }

    }

    //Mostrar datos del usuario especifico
    public function show($id)
    {

            //Buscar el usuario
            $user = User::findOrfail($id);
            if (!$user){
                return $user()->json([
                    'message'=>'User Not Found'
                ],404);
            }

            //retornar el JSON
            return response()->json([
                'users' => $user
            ],200);

    }

    //Editar/actualizar datos de usuario
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

        //PARA ACTUALIZAR PASSWORD -
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $user = User::find($id);
            $user->password = $input['password'];
            $user->save();
        }/* else{
            $input = Arr::except($input, ['password']);
        } */

        $data = User::find($id);
        $data->fill($request->except('password'));
        $data->save();

        return response()->json($input, 200);
    }

    //borrar usuario
    public function destroy($id)
    {
        //Detalles
        $users = User::find($id);
        if(!$users){
            return response()->json([
                'message'=>'User not found!!'
            ],404);
        };

        //Borrar Usuario
        $users->delete();

        //Retornnando JSON
        return response()->json([
            'message' => 'User successfully deleted.'
        ],200);

        /* return response()->json([
            'user active'=>$users,
        ],200); */
    }

    // register
    public function register(Request $request)
    {
       /*  $input = $request->only('name', 'email', 'password', 'c_password'); */

        $validator = Validator::make(/* $input */ $request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
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

        $user = User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $authHandler = new AuthHandler;
            $token = $authHandler->GenerateToken($user);

            $success = [
                'user' => $user,
                'token' => $token,
            ];

            return response()->json([$success, 'user registered successfully'], 201);
        }

    }
}
