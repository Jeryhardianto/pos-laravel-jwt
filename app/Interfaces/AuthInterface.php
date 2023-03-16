<?php 
namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

Interface AuthInterface
{
    public function login(LoginRequest $request);
    public function register(RegisterRequest $request);
    public function logout(Request $request);
}

?>