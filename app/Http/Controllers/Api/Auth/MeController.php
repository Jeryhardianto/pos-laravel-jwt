<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Interfaces\AuthInterface;
use App\Http\Controllers\Controller;

class MeController extends Controller
{
    protected $authInterface;

    public function __construct(AuthInterface $authInterface)
    { 
        $this->middleware('auth:api');
        $this->authInterface = $authInterface;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->authInterface->me();
    }
}
