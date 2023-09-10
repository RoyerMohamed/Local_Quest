<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:sanctum")->except("index"); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Category::count() === 0) {
            return response()->json(['message' => 'Pas de categorie trouvé'], 404);
        }

        return response()->json(['message' => 'Categories trouvé', 'Categories' => Category::with("shops")->get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "category_name" =>  'max:50|string|required',
                "category_icon" =>  'max:50|string|required',
                "category_color" => 'max:7|string|required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],400);
        }

        $category = Category::create($request->all());

        return response()->json( ['message' => 'La Categorie a été ajoutée ', 'Categorie' => $category],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (!$category) {
            return response()->json(['message' => "La categorie n'existe pas"], 404);
        }

        return response()->json(['message' => 'Categorie trouvée', 'Categorie' => $category], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        if (!$category) {
            return response()->json(['message' => "La categorie n'existe pas"], 404);
        }

        $validator = Validator::make($request->all(), [
            "category_name" =>  'max:50|required',
            "category_icon" =>  'max:50|required',
            "category_color" => 'max:7|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $category->update($request->all());

        return response()->json(['message' => 'La Categorie a été mise à jours', 'Categorie' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category) {
            return response()->json(['message' => "La categorie n'existe pas"], 404);
        }

        Category::destroy($category->id);
        return response()->json(['message' => 'La Categorie a été supprimé '], 200);
    }
}
