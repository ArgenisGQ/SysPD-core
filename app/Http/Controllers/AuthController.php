<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
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


    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:users',
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            /* return response()->json($validator->errors()); */
            return response()->json(['message' => $validator->errors()]);
        };
        $user = User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json([
                'data'         => $user,
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ]);
    }

    public function login(Request $request){
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json(['message' => 'Unauthorized', 'status' => 'fail' ],401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
          ->json([
                'message'     => 'Hi '.$user->name,
                'accessToken' => $token,
                'token_Typen' => 'Bearer',
                'user'        => $user,
                'status'      => 'success',
          ]);
    }

    /* public function logout(User $user) */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        /* $user->tokens()->delete(); */
        return[
            /* 'token'   => $user, */
            'message' => 'You have successfully loggged out and the token was successfully delete'
        ];
    }
}
