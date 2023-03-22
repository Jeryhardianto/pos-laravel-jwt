<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CetagoryRequest;
use App\Interfaces\CetagoryInterface;

class CetagoryRepository implements CetagoryInterface
{
  
    public function getListCetagories($request)
    {
        
        try {
            $perPage = $request->get('per_page', 10);
            $categories = Category::paginate($perPage);
        
            return response()->json([
                'success' => true,
                'message' => 'Lists All Categories',
                'data' => $categories,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 500);
        }
    }
    public function getListCetagoriesById($id)
    {
        try {
            $categories = Category::find($id);
        
            return response()->json([
                'success' => true,
                'message' => 'List Cetagory',
                'data' => $categories,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'List Not Found'
            ], 500);
        }
    }
    public function store(CetagoryRequest $request)
    {
         //create cetagory
         $Category = Category::create([
            'name'      => $request->name
        ]);

        if($Category) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $Category
            ], 200);
        }
    }

    public function update(CetagoryRequest $request, $id)
    {
        $cetagory = Category::find($id);
        $cetagory->name = $request->name;
        $cetagory->updated_at = now(); 
        $cetagory->save();
        if($cetagory) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully',
                'data' => $cetagory
            ], 200);
        }
    }
}

?>