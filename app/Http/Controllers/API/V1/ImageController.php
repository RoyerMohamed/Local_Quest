<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Image::count() === 0) {
            return response()->json(['message' => "Aucune image trouvée"], 404);
        }

        return response()->json(['message' => 'Images trouvées', 'images' => Image::paginate(10)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "image_name" => 'required|max:25',
                'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
                "user_id" => 'required',
                "shop_id" =>  'nullable',
                "recipe_id" => 'nullable',
                "is_profil" => 'nullable'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        UploadImage($request->image, $request->user_id, $request->shop_id, $request->recipe_id , $request->is_profil);

        return response()->json(['message' => 'L\'image a été ajoutée '], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        if (!$image) {
            return response()->json(['message' => "Aucune image trouvée"], 404);
        }

        return response()->json(['message' => 'Images trouvée', 'Image' => $image], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "image_status" => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $image->update($request->all());

        return response()->json(['message' => 'L\'image a été modifiée', 'Image' => $image], 200);
    }


    public function getImageById(Request $request)
    {
        //dd($request->id);
        $user_image = Image::find($request->id);
        
        return response()->json(['message' => 'Image trouvée', 'user_image' => $user_image], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        if (!$image) {
            return response()->json(['message' => 'Aucune image trouvé'], 404);
        }


        if (file_exists(public_path('images') . '/' . $image->image_name)) {
            unlink(public_path('images') . '/' . $image->image_name);
        }

        Image::destroy($image->id);
        return response()->json(['message' => 'L\'image a été supprimé'], 200);
    }
}
