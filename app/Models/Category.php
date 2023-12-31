<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

  //  protected $with = ["shops"]; 

    protected $fillable = [
        'category_name',
        'category_icon',
        'category_color',
    ];

    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
