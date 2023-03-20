<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\AuthInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

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

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refreshToken(Request $request)
    {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


}

?>