<?php

use App\Models\Image;
use App\Models\User;

 /** 
 *  UploadImage Helpers
 * @param $requeste
 */


function UploadImage( $image ,$user_id ,$shop_id = null , $recipe_id = null , $is_profil = null){

    $imageName = time() . '.' . $image->extension();
    $image->move(public_path('images'), $imageName);
    $user = User::find($user_id); 


    Image::create([
        "image_name" => $imageName,
        "image_status" => $user->role->role_name === "admin" || $shop_id === null && $recipe_id === null ? 1 : 0 ,
        "user_id" => $user_id, 
        "shop_id" =>  $shop_id, 
        "recipe_id" => $recipe_id,
        "is_profil" => $is_profil
    ]); 

    return $imageName;
}