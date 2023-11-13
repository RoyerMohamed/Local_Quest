<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $with = ["user","reviews","department","images"]; 

    protected $fillable = [
    "recipe_title",
    'difficulty',
    "num_persons",
    "ingredients" ,
    "cooking_time",
    "preparation_time",
    "recipe_status",
    "department_id" ,
    "user_id"
    ];
    
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
