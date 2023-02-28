<?php 
namespace App\Interfaces;

use App\Http\Requests\RegisterRequest;

Interface AuthInterface
{

    public function register(RegisterRequest $request);
}

?>