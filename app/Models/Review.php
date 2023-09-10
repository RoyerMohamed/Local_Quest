<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // the rewiew belonge's to a shop 
    // example: the review that says 'the best shop ever !! '
    // can only be posted to one and only shop 

    protected $fillable = [
        "rating",
        'message',
        "review_status",
        "user_id" ,
        "recipe_id",
        "shop_id"
    ];


    public function shop(){
        return $this->belongsTo(Shop::class); 
    }

    // the rewiew belonge's to a recipe 
    // example: the review that says 'the best franch taost ever !! '
    // can only be posted to one and only recipe 
    public function recipe(){
        return $this->belongsTo(Recipe::class); 
    }

    // the rewiew belonge's to a recipe 
    // example: the review that says 'the best franch taost ever !! '
    // can only be posted to one and only user 
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
