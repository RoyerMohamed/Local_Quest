<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

 

    protected $fillable = [
        "product_name" ,
        "product_icon" ,
        "product_color" , 
    ];
    
    public function shops(){
        return $this->belongsToMany(Shop::class ,'shops_products',  'shop_id' ,'product_id');
    }
}
