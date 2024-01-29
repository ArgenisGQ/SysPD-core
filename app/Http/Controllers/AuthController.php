<?php

namespace App\Http\Controllers;

use App\Handlers\Admin\AuthHandler;
use App\Models\User;
use Firebase\JWT\JWT;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class AuthController extends APIController
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

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        $validator = Validator::make($input, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }

        $remember = $request->remember;

        if(Auth::attempt($input, $remember)){
            $user = Auth::user();

            $authHandler = new AuthHandler;
            $token = $authHandler->GenerateToken($user);

            $success = ['user' => $user, 'token' => $token];

            /* return $this->sendResponse($success, 'Logged In'); */

            return response()
                    ->json([
                            'message'     => 'Hi '.$user->name,
                            'accessToken' => $token,
                            'token_Typen' => 'Bearer',
                            'user'        => $user,
                            'status'      => 'success',
          ]);

        }
        else{
            return $this->sendError('Unauthorized',
                                   ['error' => "Invalid Login credentials"],
                                   401);
            /* return response()
                    ->json([
                            'message'     => 'Unauthorized',
                            'status'      => '401',
                        ]); */
        }
    }

    public function logout(Request $request)
    {

        /* $request->user()->currentAccessToken()->delete(); */
        auth()->user()->tokens()->delete();

       /*  return $this->sendResponse([], 'Logged Out'); */

        return[
            /* 'token'   => $user, */
            'message' => 'You have successfully loggged out and the token was successfully delete'
        ];


    }
}
