<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        "image_name" ,
        "image_status" ,
        "user_id" , 
        "shop_id", 
        "recipe_id",
        "is_profil"
    ];

    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function user_profil(){
        return $this->belongsTo(User::class); 
    }

    public function shop(){
        return $this->belongsTo(Shop::class); 
    }

    public function recipe(){
        return $this->belongsTo(Recipe::class); 
    }
}
