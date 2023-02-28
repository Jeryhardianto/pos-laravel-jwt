<?php
namespace App\Repositories;
use App\Models\User;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthRepository implements AuthInterface
{

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
                'status' => 'success',
                'message' => 'User created successfully',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
}

?>