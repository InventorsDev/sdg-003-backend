<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;
use App\Traits\Auth\AuthResponse;

class UserController extends Controller
{
    private $role;
    use AuthResponse;
    public function register(UserRegisterRequest $request)
    {
      
        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phonenumber' => $request->input('phonenumber'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully Created user'
        ], 201);
    }

    public function login(UserLoginRequest $request)
    {
       

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'error' => 'Invalid Credentials'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not create token'
            ], 500);
        }
        // $user =User::where('email',request('email'));
        // if ($user){
        //     $user->hasRole('admin') ? $this->role="admin" : $this->role="user";
        // }

        return $this->respondWithToken($token, $this->role);
        // return response()->json([
        //     'token' => $token
        // ], 200);
    }
    
}
