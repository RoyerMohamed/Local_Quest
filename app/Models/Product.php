<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = ["shops"]; 

    protected $fillable = [
        "product_name" ,
        "product_icon" ,
        "product_color" , 
        'shop_id'
    ];
    
    public function shops(){
        return $this->belongsToMany(Shop::class , "products_shops");
    }
}
