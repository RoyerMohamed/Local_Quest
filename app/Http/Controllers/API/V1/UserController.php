<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (User::count() === 0) {
            return response()->json(['message' => 'Pas de utilisateurs trouvé'], 404);
        }

        return response()->json(['message' => 'Utilisateurs trouvé', 'Utilisateurs' => User::latest()->paginate()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "user_name" =>  'required|max:100',
                'email' => 'required|email|unique:users,email',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
                'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            ]
        );


        if ($validator->fails()) {

            return response()->json([['errors' => $validator->errors()]], 422);
        }
        // ajouter le helper poour la sauvgarde d'images
        $user = User::create([
            "user_name" =>  $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profil_picture' => 0
        ]);

        if ($request->has('image')) {
            dd($request->image);
            $user->update([
                "profil_picture" => $request->hasFile('image') ? UploadImage($request->image, $user->id) : 0
            ]);
            $user->save();
        }


        return response()->json(['message' => 'L\'utilisateur a été ajouté ', 'Utilisateur' => $user], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (!$user) {
            return response()->json(['message' => 'L\'utilisateur pas trouvé'], 401);
        }

        return response()->json(['message' => 'L\'utilisateur trouvé', 'Utilisateur' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "user_name" =>  'max:100',
                'email' => 'email|unique:users,email',
            ]
        );


        if ($validator->fails()) {
            return response()->json([['errors' => $validator->errors()]], 422);
        }



        $user->update($request->all());
        return response()->json(['message' => 'L\'utilisateur a été modifier', 'user' => $user], 200);
    }

    public function updateImage(Request $request, User $user)
    {
        //dd($request->hasFile('image'));
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json([['errors' => $validator->errors()]], 422);
        }

        if ($request->hasFile('image')) {
            $userImage = UploadImage($request->image, Auth::user()->id);
          
            $user = User::find(Auth::user()->id);
            $user->update([
                "profil_picture" => $userImage
            ]);
            return response()->json(['message' => 'L\'utilisateur a été modifier', 'userImage' => $userImage], 200);
        }

        return response()->json(['errors' => "il y a un soucis avec votre images"], 200);
    }

    public function updatepassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (Hash::check($request->password, $user->password)) {
            if ($request->password !== $request->new_password) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json(['message' => 'Votre mot de passe a bien été modifié'], 200);
            } else {
                return response()->json(['message' => 'Votre nouveau mot de passe est identique avec ancien'], 200);
            }
        } else {
            return response()->json(['message' => 'Votre mot de passe actuel ne correspond pas ! '], 200);
        }
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
