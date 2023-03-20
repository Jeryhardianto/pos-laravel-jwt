<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Interfaces\AuthInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    protected $authInterface;

    public function __construct(AuthInterface $authInterface)
    { 
        $this->authInterface = $authInterface;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        return $this->authInterface->login($request);
    }
}
