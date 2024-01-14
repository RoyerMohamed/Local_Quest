<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["index"]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Product::count() === 0) {
            return response()->json(['message' => 'Aucun produit trouvé'], 404);
        }

        return response()->json(['message' => 'Produits trouvé', 'Produits' => Product::latest()->get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "product_name" =>  'max:50|string|required',
                "product_icon" =>  'max:50|string|required',
                "product_color" => 'max:7|string|required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],400);
        }

        $product = Product::create($request->all());

        return response()->json( ['message' => 'Le Produit a été ajoutée ', 'Produit' => $product],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        if (!$product) {
            return response()->json(['message' => 'Aucun produit trouvé'], 404);
        }

        return response()->json(['message' => 'Produit trouvée', 'Produit' => $product], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        if (!$product) {
            return response()->json(['message' => 'Aucun produit trouvé'], 404);
        }

        $validator = Validator::make($request->all(), [
            "product_name" =>  'max:50|required',
            "product_icon" =>  'max:50|required',
            "product_color" => 'max:7|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $product->update($request->all());

        return response()->json(['message' => 'Le Produit a été mis à jour', 'Produit' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!$product) {
            return response()->json(['message' => 'Aucun produit trouvé'], 404);
        }

        Product::destroy($product->id);
        return response()->json(['message' => 'Le Produit a été supprimé '], 200);
    }
}
