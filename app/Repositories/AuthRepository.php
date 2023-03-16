<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthInterface
{
    public function login(LoginRequest $request)
    {
        // get credentials from request
        $credentials = $request->only('email', 'password');;

        $token = auth()->guard('api')->attempt($credentials);
        // if auth failed
        if(!$token){
            return response()->json([
                'success' => false,
                'message' => 'Email or password is incorrect'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);

    }

    public function register(RegisterRequest $request)
    {
         //create user
         $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role' => $request->role
        ]);

        //return response JSON user is created
        $token = Auth::login($user);
        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
    
    public function logout(Request $request)
    {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());
        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout succes!',  
            ], 200);
        }
    }
}

?>