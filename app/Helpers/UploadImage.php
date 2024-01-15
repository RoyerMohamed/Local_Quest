<?php

use App\Models\Image;
use App\Models\User;
use Hamcrest\Arrays\IsArray;

/** 
 *  UploadImage Helpers
 * @param $requeste
 */


function UploadImage($image, $user_id, $shop_id = null, $recipe_id = null, $is_profil = null)
{
    if (is_array($image)) {
        

        if (count($image) > 1) {

            $images_list = $image;
            $image_names = [];
            foreach ($images_list as $key =>  $images_single) {
                $imageName = time() . $key . '.' . $images_single->extension();
                $images_single->storeAs('public', $imageName);
                $user = User::find($user_id);


                Image::create([
                    "image_name" => $imageName,
                    "image_status" => $user->role->role_name === "admin" || $shop_id === null && $recipe_id === null ? 1 : 0,
                    "user_id" => $user_id,
                    "shop_id" =>  $shop_id,
                    "recipe_id" => $recipe_id,
                    "is_profil" => $is_profil
                ]);
                array_push($image_names, $imageName);
            }
            return $image_names;
        }

    } else {

        if (is_array($image)) {
            $imageName =  time() . '.' . $image[0]->extension();
            $image[0]->storeAs('public', $imageName);
        } else {
            $imageName =  time() . '.' . $image->extension();
            $image->storeAs('public', $imageName);
        }
        
        $user = User::find($user_id);

        $oldImage =  Image::where("user_id", "=", $user_id)->get();
        if (count($oldImage) > 0) {
            foreach ($oldImage as $value) {
                $image_temp = Image::find($value->id);
                $image_temp->delete();
            }
        }
     
        Image::create([
            "image_name" => $imageName,
            "image_status" => $user->role->role_name === "admin" || $shop_id === null && $recipe_id === null ? 1 : 0,
            "user_id" => $user_id,
            "shop_id" =>  $shop_id,
            "recipe_id" => $recipe_id,
            "is_profil" => $is_profil
        ]);

        return $imageName;
    }
}
