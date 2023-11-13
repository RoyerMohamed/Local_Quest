<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;


class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["index" , "show","sortByDepartments"]); 
    }
    
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Shop::count() === 0) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        return response()->json(['message' => 'Commerçants trouvé', 'Commerçants' => Shop::latest()->get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // a compléter 
        $validator = Validator::make(
            $request->all(),
            [
                "shop_title" => 'required|string|max:100',
                'description' => 'required|string',
                "website" => 'required',
                "phone_number" =>  'required',
                "zip_code" => 'required|max:5',
                "city" => 'required|max:150',
                "rating" => 'nullable',
                "longitude" => 'required',
                "latitude" => 'required',
                "department_id" => 'required',
                "category_id" => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();

        $shop = Shop::create(
            [
                "shop_title" => $request->shop_title,
                'description' => $request->description,
                "website" => $request->website,
                "phone_number" =>  $request->phone_number,
                "zip_code" => $request->zip_code,
                "city" => $request->city,
                "rating" => $request->rating,
                "longitude" => $request->longitude,
                "latitude" => $request->latitude,
                "shop_status" => $user->role->role_name === "admin" ? 1 : 0,
                "user_id" => $user->id,
                "department_id" => $request->department_id,
                "category_id" => $request->category_id,
            ]
        );
        

        return response()->json(['message' => 'Le commerçants a été ajouté ', 'Commerçants' => $shop ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        if (!$shop) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

      
        return response()->json(['message' => 'Commerçant trouvé', 'Commerçant' => Review::where($shop->id,"=","shop_id")], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Shop $shop)
    {
       $validator = Validator::make(
            $request->all(),
            [
                "shop_title" => 'required|string|max:100',
                'description' => 'required|string',
                "website" => 'required',
                "phone_number" =>  'required',
                "zip_code" => 'required|max:5',
                "city" => 'required|max:150',
                "rating" => 'nullable',
                "longitude" => 'required',
                "latitude" => 'required',
                "department_id" => 'required',
                "category_id" => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        
        $shop->update(
            [
                "shop_title" => $request->shop_title,
                'description' => $request->description,
                "website" => $request->website,
                "phone_number" =>  $request->phone_number,
                "zip_code" => $request->zip_code,
                "city" => $request->city,
                "rating" => $request->rating,
                "longitude" => $request->longitude,
                "latitude" => $request->latitude,
                "shop_status" => $user->role->role_name === "admin" ? 1 : 0,
                "department_id" => $request->department_id,
                "category_id" => $request->category_id,
            ]
        );
        

        return response()->json(['message' => 'Le commerçant a été modifié ', 'Commerçant' => $shop ], 200);
    }


    public function sortShops(Request $request){
      $sorted_shops = QueryBuilder::for(Shop::class)->allowedFilters(["department_id" , "category_id","shop_title"])->get(); 
      return response()->json(['message' => 'Commerçants trouvé', 'Commerçants' => $sorted_shops], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        if (!$shop) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        Shop::destroy($shop->id);
        return response()->json(['message' => 'Le commerçants a été supprimé '], 200);
    }
}
