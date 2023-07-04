<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function reviews(){
        return $this->hasMany(Rewiew::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Rewiew::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
