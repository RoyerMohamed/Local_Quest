<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Formating ma data to return only the feild needed 
        // Allso passing title to calmel case (json convention)
        
        return [
            "shopTitle" => $this->shop_title, 
            "description" => $this->description, 
            "website" => $this->website, 
            "phoneNumber" => $this->phone_number, 
            "zipCode" => $this->zip_code, 
            "city" => $this->city, 
            "rating" => $this->rating, 
            "longitude" => $this->longitude, 
            "latitude" => $this->latitude, 
            "shopStatus" => $this->shop_status,            
        ];
    }
}
