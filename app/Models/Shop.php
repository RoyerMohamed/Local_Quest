<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $with = ["user","department","category"]; 

    protected $fillable = [
        "shop_title",
        'description',
        "website",
        "phone_number" ,
        "zip_code",
        "city",
        "rating",
        "shop_status",
        "longitude" ,
        "latitude",
        "user_id",
        "department_id",
        "category_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class , "products_shops");
    }
    
    public function opening_hours(){
        return $this->belongsToMany(OpeningHour::class , "openingHours_shops");
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

}
