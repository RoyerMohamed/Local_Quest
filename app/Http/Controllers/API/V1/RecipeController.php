<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
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

        if (Recipe::count() === 0) {
            return response()->json(['message' => "Aucune recette trouvée"], 404);
        }

        return response()->json(['message' => 'Recettes trouvées', 'Recette' => Recipe::latest()->get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "recipe_title" => 'required|string|max:100',
                'difficulty' => 'required|string',
                "num_persons" => 'required|integer',
                "ingredients" =>  'required|string',
                "cooking_time" => 'required|date_format:H:i',
                "preparation_time" => 'required|date_format:H:i',
                "department_id" => 'nullable', 
                'recipe_status' => 'nullable'

            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        $recipe = Recipe::create(
            [
                "recipe_title" => $request->recipe_title,
                'difficulty' => $request->difficulty,
                'recipe_status' => $request->has("recipe_status") ? $request->recipe_status : ( $user->role->role_name === "admin" ? 1 : 0),
                "num_persons" => intval($request->num_persons),
                "ingredients" =>  $request->ingredients,
                "cooking_time" => $request->cooking_time,
                "preparation_time" => $request->preparation_time,
                "department_id" => $request->department_id,
                "user_id" => $user->id,
            ]
        );

        return response()->json(['message' => 'La recette a été ajoutée ', 'Recette' => $recipe], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        if (!$recipe) {
            return response()->json(['message' => "Aucune recette trouvée"], 404);
        }

        return response()->json(['message' => 'Recette trouvées', 'Recette' => $recipe], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Recipe $recipe, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "recipe_title" => 'required|string|max:100',
                'difficulty' => 'required|string',
                "num_persons" => 'required',
                "ingredients" =>  'required|string',
                "cooking_time" => 'required|date_format:H:i',
                "preparation_time" => 'required|date_format:H:i',
                "department_id" => 'nullable'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        $recipe->update(
            [
                "recipe_title" => $request->recipe_title,
                'difficulty' => $request->difficulty,
                'recipe_status' => $request->recipe_status,
                "num_persons" => intval($request->num_persons),
                "ingredients" =>  $request->ingredients,
                "cooking_time" => $request->cooking_time,
                "preparation_time" => $request->preparation_time,
                "department_id" => $request->department_id,
            ]
        );

        return response()->json(['message' => 'La recette a été modifiée ', 'Recette' => $recipe], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if (!$recipe) {
            return response()->json(['message' => "Aucune recette trouvée"], 404);
        }

        Recipe::destroy($recipe->id);
        return response()->json(['message' => 'La Recette a été supprimée '], 200);
    }
}
