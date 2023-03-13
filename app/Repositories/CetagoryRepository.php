<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Interfaces\CetagoryInterface;

class CetagoryRepository implements CetagoryInterface
{
    public function getListCetagories($request)
    {
        try {
            $perPage = $request->get('per_page', 10);
            $categories = Category::paginate($perPage);
            // When data cetagories is null
            if(!$categories['data'])
            {
                return response()->json([
                    'success' => false,
                    'message' => 'List All Categories Not Found'
                ], 404);
            }
    
            return response()->json([
                'success' => true,
                'message' => 'List All Categories',
                'data' => $categories,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 500);
        }
    }
  

    // public function register(RegisterRequest $request)
    // {
    //      //create user
    //      $user = User::create([
    //         'name'      => $request->name,
    //         'email'     => $request->email,
    //         'password'  => bcrypt($request->password),
    //         'role' => $request->role
    //     ]);

    //     //return response JSON user is created
    //     $token = Auth::login($user);
    //     if($user) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'User created successfully',
    //             'user' => $user,
    //             'authorization' => [
    //                 'token' => $token,
    //                 'type' => 'bearer',
    //             ]
    //         ]);
    //     }

    //     //return JSON process insert failed 
    //     return response()->json([
    //         'success' => false,
    //     ], 409);
    // }
}

?>