<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Category::count() < 0) {
            return response()->json(['message' => 'Pas de categories trouvé'], 404);
        }

        return response()->json(['message' => 'Categories trouvé', 'Categories' => Category::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "category_name" =>  'max:100|unique',
            "category_icon" =>  'max:50|unique',
            "category_color" => 'max:7|unique',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->category_icon = $request->input('category_icon');
        $category->category_color = $request->input('category_color');

        $category->save();

        return response()->json(['message' => 'La Categorie a été ajouté ', 'Categorie' => $category], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (!$category) {
            return response()->json(['message' => 'Pas de categories trouvé'], 422);
        }
        return response()->json(['message' => 'Categorie trouvé', 'Categorie' => $category], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Category $category)
    {
        if (!$category) {

            return response()->json(['message' => 'Pas de categories trouvé'], 404);
        }
        
        $validator = Validator::make($request->all(), [
            "category_name" =>  'max:100',
            "category_icon" =>  'max:50',
            "category_color" => 'max:7',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category->category_name = $request->input('category_name');
        $category->category_icon = $request->input('category_icon');
        $category->category_color = $request->input('category_color');

        $category->update();

        return response()->json(['message' => 'User updated successfully', 'user' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category) {
            return response()->json(['message' => 'Pas de categories trouvé'], 404);
        }

        Category::destroy($category->id); 
        return response()->json(['message' => 'La Categories a été supprimé '], 200);
    }
}
