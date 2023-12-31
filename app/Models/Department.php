<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $with = ["region"]; 
    
    public function recipes(){
        return $this->hasMany(Recipe::class); 
    }

    public function region(){
        return $this->belongsTo(Region::class); 
    }
    public function shops(){
        return $this->hasMany(Shop::class); 
    }
}
