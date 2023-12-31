<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $with = ["user", "department", "category", "images", "products" , "reviews" , "opening_hours" ];

    protected $fillable = [
        "shop_title",
        'description',
        "website",
        "phone_number",
        "zip_code",
        "city",
        "rating",
        "shop_status",
        "longitude",
        "latitude",
        "user_id",
        "department_id",
        "category_id", 
        'adresse'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'shops_products', 'shop_id' ,'product_id');
    }

    public function opening_hours()
    {
        return $this->belongsToMany(OpeningHour::class, "opening_hours_shops",'opening_hour_id','shop_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
