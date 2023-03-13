<?php 
namespace App\Interfaces;

use App\Http\Requests\CetagoryRequest;

Interface CetagoryInterface
{
    public function getListCetagories($request);
    // public function getListCetagoriesById($id);
    // public function store(CetagoryRequest $request);
    // public function update(CetagoryRequest $request);
    // public function delete(CetagoryRequest $request);
}

?>