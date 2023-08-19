<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (User::count() < 0) {
            return response()->json(['message' => 'Pas de categories trouvé'], 404);
        }

        return response()->json(['message' => 'Categories trouvé', 'Categories' => User::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_name" =>  'required|max:100',
            'email' => 'required|email|unique:users,email',
            "password" => Password::default(),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return response()->json(['message' => 'L\'utilisateur a été ajouté ', 'Utilisateur' => $user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (!$user) {
            return response()->json(['message' => 'L\'utilisateur trouvé'], 422);
        }

        return response()->json(['message' => 'L\'utilisateur trouvé', 'Utilisateur' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "user_name" =>  'max:100|unique',
            "email" =>  'max:50|unique',
            "password" => Password::default(),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->update();

        return response()->json(['message' => 'L\'utilisateur a été modifier', 'user' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json(['message' => 'Pas d\'utilisateur trouvé'], 404);
        }

        User::destroy($user->id); 
        return response()->json(['message' => 'L\'utilisateur a été supprimé'], 200);
    }
}
