<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Shop;
use App\Models\Image;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(["index", "show", "sortByDepartments" , "sortShops" , 'note']);
        
    }

    /**
     * Display a listing of the resource.
     */     
    public function index()
    {
        if (Shop::count() === 0) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        return response()->json(['message' => 'Commerçants trouvé', 'commercant' => Shop::latest()->get()], 200);
    }

    public function getShopByCategorie(){
        if (Shop::count() === 0) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
            
        }
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
                "adresse" => 'required|string|max:100',
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
                'image.*' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();

        $shop = Shop::create(
            [
                "shop_title" => $request->shop_title,
                "adresse" => $request->adresse,
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

        if( is_array($request->products_id) && count($request->products_id) > 0){
            
            foreach($request->products_id as $product_id){
                DB::table("shops_products")->insert([
                    'shop_id' => $shop->id ,
                    'product_id' => $product_id
                ]);
            }
        }
        $shopImage = "";
        if ($request->hasFile('image')){
            //dd($request->image);
            $shopImage = UploadImage($request->image, Auth::user()->id ,$shop->id );
        }else{
            $defaultImage = Category::find($shop->category_id); 
            Image::create([
                "image_name" =>  $defaultImage->default_shop_image,
                "image_status" => Auth::user()->role->role_name === "admin"  ? 1 : 0,
                "user_id" => Auth::user()->id,
                "shop_id" =>  $shop->id,
                "recipe_id" => null,
                "is_profil" =>null
            ]);
        }
        return response()->json(['message' => 'Le commerçants a été ajouté ', 'commercant' => $shop ,$shopImage ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        if (!$shop) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }


        return response()->json(['message' => 'Commerçant trouvé', 'shop' => $shop], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "shop_title" => 'nullable|string|max:100',
                'description' => 'nullable|string',
                "website" => 'nullable',
                "phone_number" =>  'nullable',
                "zip_code" => 'nullable|max:5',
                "city" => 'nullable|max:150',
                "rating" => 'nullable',
                "longitude" => 'nullable',
                "latitude" => 'nullable',
                "department_id" => 'nullable',
                "category_id" => 'nullable',
               
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();
        if(isset($request->department_id) ){
            $shop->update(
                [
                    "department_id" => $request->department_id,
                ]
            );
        }
        if(isset($request->category_id) ){
            $shop->update(
                [
                    "category_id" => $request->category_id,
                ]
            );
        }
       
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
            ]
        );

        if(is_array($request->products_id)){
            $shop->products()->detach();
            $shop->products()->attach($request->products_id);
        }

        return response()->json(['message' => 'Le commerçant a été modifié ', 'commercant' => $shop], 200);
    }
    public function updateImage(Request $request,  $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'files.*' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
                ]
            );
            //dd($request->hasFile('files'));

        if ($validator->fails()) {
            return response()->json([['errors' => $validator->errors()]], 422);
        }

       // dd($request->files); 
        if ($request->hasFile('files')) {
            $shopImage = UploadImage($request->files, Auth::user()->id , $id);
          
             return response()->json(['message' => 'L\'image a été modifier', 'shopImage' => $shopImage], 200);
        }

        return response()->json(['errors' => "il y a un soucis avec votre images"], 200);
    }

    public function sortShops()
    {
        $sorted_shops = QueryBuilder::for(Shop::class)->allowedFilters(["department_id", "category_id", "shop_title", "products"])->get();
        return response()->json(['message' => 'Commerçants trouvé', 'commercant' => $sorted_shops], 200);
    }

    public function getShopByUserId(){

        $userShops = Shop::where("user_id","=", auth::user()->id)->latest()->get();

        if (count($userShops) === 0) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        return response()->json(['message' => 'Commerçants trouvé', 'commercant' => $userShops], 200);
    }

    public function  editShopStatus( Request $request , $id){

        $validator = Validator::make(
            $request->all(),
            [
                "shop_status" => 'required|boolean',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $shop = Shop::find($id); 
        $shop->update([
            "shop_status" => $request->shop_status,
        ]); 
        return response()->json(['message' => 'Le commerçant a été modifié ', 'commercant' => $shop], 200); 
    }


    public function note(){
        $ratedShops = Shop::where("rating",">=",4)->take(4)->get(); 
        return response()->json(['message' => 'Commerçants trouvé', 'commercant' => $ratedShops], 200);
        //dd($ratedShops);
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
