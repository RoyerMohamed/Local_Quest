<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
    
    public function opening_hours(){
        return $this->hasMany(Opening_hour::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

}
