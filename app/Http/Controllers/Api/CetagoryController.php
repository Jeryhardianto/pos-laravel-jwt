<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CetagoryInterface;

class CetagoryController extends Controller
{
    protected $categoryInterface;

    public function __construct(CetagoryInterface $categoryInterface)
    { 
        $this->categoryInterface = $categoryInterface;
    }

    public function index(Request $request)
    {
        return $this->categoryInterface->getListCetagories($request);
    }
}
