<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$this->guard()->attempt($credentials)) {
            return response()->json([

                'message' => 'The provided credentials are incorrect.'
            ], 422);
        }
        $this->guard()->attempt($credentials);
        $token = $this->guard()->user()->createToken('auth-token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $this->guard()->user()
        ], 200);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        $this->guard()->logout();
        return response()->json([
            'status_code' => '200',
            'message' => 'logged out successfully'
        ]);
    }

    public function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }
    public function updateProfile(Request $request)
    {
       $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

     User::where('id', $request->id)->update([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    return $this->Login($request);
    // $updateUser = User::find($request->id);
    // if ($updateUser) {
    //     event(new Registered($updateUser));
    //     $token = $updateUser->createToken('access_token')->plainTextToken;
    //     return response()->json(["token" => $token , "type" => "Bearer", "user"=> $updateUser]);
    // }

    }
}
