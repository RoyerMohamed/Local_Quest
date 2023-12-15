<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //

    public function getAllData(){
        $users = User::get();
        $shops = Shop::get(); 
        return response()->json(['message' => 'Utilisateurs trouvé', 'users' => $users , "shops" => $shops], 200); 
        //return all admin data 
    }
}
