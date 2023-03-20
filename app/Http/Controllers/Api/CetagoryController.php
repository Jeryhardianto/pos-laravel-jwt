<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CetagoryInterface;
use App\Http\Requests\CetagoryRequest;

class CetagoryController extends Controller
{
    protected $categoryInterface;

    public function __construct(CetagoryInterface $categoryInterface)
    { 
        $this->middleware('auth:api');
        $this->categoryInterface = $categoryInterface;
    }

    public function index(Request $request)
    {
        return $this->categoryInterface->getListCetagories($request);
    }

    public function getCetagoryById($id)
    {
        return $this->categoryInterface->getListCetagoriesById($id);
    }
    
    public function store(CetagoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function update(CetagoryRequest $request, $id)
    {
        return $this->categoryInterface->update($request, $id);
    }
}
