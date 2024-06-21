<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //login function
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) 
        {
            $user = Auth::user();
            $token = $user->createToken('YourApp')->accessToken;
            return response()->json([
                'status' =>200,
                'token' => $token,
        ]);
        } 
        else 
        {
            return response()->json([
                'status' => 401,
                'error' => 'Unauthenticated'
            ]);
        }
    }


 //register function
    public function register(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'email' => 'email|unique:users',
            'password' => 'required|min:6|max:100',
         ]);

         if($validator->fails()) 
         {
            return response()->json([
                'status'=>400,
                'message' => 'Validator failled'
        
            ]);
         }

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
         ]);
         return response()->json([
            'status'=>200,
            'message' => 'registration successfull',
            'data'=>$user
        ]);


      
    }
}


