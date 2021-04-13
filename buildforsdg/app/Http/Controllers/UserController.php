<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
      
        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        return response()->json([
            'message' => 'Successfully Created user'
        ], 201);
    }
    
}
