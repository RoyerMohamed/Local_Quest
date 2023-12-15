<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function loginUser(Request $request )
    {
        
        $validatedData = $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

     if (!auth()->attempt($validatedData)) {
         return response()->json(['message' => 'Les informations saisie ne sont pas correct'], 401);
     }
 
     $user = User::find(auth()->user()->id);
     $user->token = $user->createToken('userToken' . $user->id)->plainTextToken;
  
     return response()->json([
         'user' => $user,
     ]);

    }
}
