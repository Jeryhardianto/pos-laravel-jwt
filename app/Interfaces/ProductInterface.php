<?php 
namespace App\Interfaces;

use App\Http\Requests\ProductRequest;

Interface ProductInterface
{
    public function getListProduct($request);
    // public function getListProductById($id);
    // public function store(ProductRequest $request);
    // public function update(ProductRequest $request, $id);
    // public function delete(ProductRequest $request);
}

?>