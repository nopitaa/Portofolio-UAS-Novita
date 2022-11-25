<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $user = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'no_ktp' =>$request->no_ktp,
            'password' => bcrypt ($request->password)
        ]);

        $token =$user->CreateToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        return response($response, 201);
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' =>'required|string',
            'password' =>'required|string'
        ]);

        //check email 
        $user = User::where('email', $fields['email'])->first();

        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'unauthorized'
            ],401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
