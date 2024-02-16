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
use App\Helpers\AdminHelper;
use App\Helpers\PublicHelper;


use Illuminate\Support\Facades\Hash;

class AuthController extends APIController
{
    public function indexold(){
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
    public function registerold(Request $request)
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

    public function loginold(Request $request)
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


            /* $token = auth()->factory()->getTTL()*60; */

            /* $success = ['user' => $user, 'token' => $token]; */

            /* return $this->sendResponse($success, 'Logged In'); */

            return response()
                    ->json([
                            'message'     => 'Hi '.$user->name,
                            'accessToken' => $token,
                            'token_Type' => 'Bearer',
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

    public function logoutold(Request $request)
    {

        /* $request->user()->currentAccessToken()->delete(); */

       /*  auth()->user()->token()->delete(); */

       /*  return $this->sendResponse([], 'Logged Out'); */

       /* $user = Auth::user(); */

      /*  $user = $request; */


      // delete all tokens, essentially logging the user out
       /* $user->tokens()->delete(); */

      // delete the current token that was used for the request
       /* $request->user()->currentAccessToken()->delete(); */



       /* $user = Auth::user(); */

       /* $user = auth()->user(); */

       /* $request->user()->currentAccessToken()->delete(); */

       /* Auth::guard('api')->logout(); */

       /* $user = Auth::user(); */

        /* Auth::guard()->logout(); */

        /* $request->user()->currentAccessToken()->delete(); */

        $adminHelper = new AdminHelper();
        $user = $adminHelper->GetAuthUser();

        $publicHelper = new PublicHelper();
        $token = $publicHelper->GetAndDecodeJWT();


        /* $user->user()->cucurrentAccessToken()->delete(); */

        return[
            /* 'token'   => $user, */
            /* 'full' => $user, */
            'user' => $user,
            'token'=> $token,
            'message' => 'You have successfully loggged out and the token was successfully delete'
        ];


    }

    //OTRA MANERA SON JWT


    /* public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    } */

    public function login(Request $request)
    {
        

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
            'user' => Auth::user(),
        ]);
    }

    public function userActive()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }

    public function refreshToken()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
