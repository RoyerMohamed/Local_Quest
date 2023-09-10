<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'morning_opening_hour',
        'morning_closing_hour',
        'afternoon_opening_hour',
        'afternoon_closing_hour',
        'user_id'
    ];
    
    public function shops(){
        return $this->belongsToMany(Shop::class , "opening_hours_shops");
    }
    
}
