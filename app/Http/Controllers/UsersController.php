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

        /* return response()
            ->json($users); */

        return $users;
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
            return $this->sendError('message', $validator->errors(), 422);
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

            return $this->sendResponse($success, 'user registered successfully', 201);
        }

    }

    //Mostrar datos del usuario especifico
    public function show($id)
    {
        $user = User::findOrfail($id);

        return $user;

    }

    //Editar/actualizar datos de usuario
    public function update(Request $request)
    {

    }

    //borrar usuario
    public function destroy($id)
    {

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
            return $this->sendError('message', $validator->errors(), 422);
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

            return $this->sendResponse($success, 'user registered successfully', 201);
        }

    }
}
