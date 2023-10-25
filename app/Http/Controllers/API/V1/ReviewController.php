<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Review::count() === 0) {
            return response()->json(['message' => "Aucun avis trouvé"], 404);
        }

        return response()->json(['message' => 'Avis trouvés', 'Avis' => Review::latest()->paginate()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "rating" => 'nullable|max:5',
                'message' => 'required|string',
                'user_id' => 'required',
                "recipe_id" => 'nullable',
                "shop_id" => 'nullable'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();

        $reviws = Review::create([
            "rating" => $request->rating,
            'message' => $request->message,
            'review_status' => $user->role->role_name === "admin" ? 1 : 0,
            'user_id' => $user->id,
            "recipe_id" => $request->recipe_id,
            "shop_id" => $request->shop_id
        ]);
        
        return response()->json(['message' => 'L\'avis a été ajouté ' , 'Avis' => $reviws], 200);
    }

    /**
     * Display the specified resource.
     */
     public function show(Review $review)
     {
         if (!$review) {
             return response()->json(['message' => "Aucun avis trouvé"], 404);
         }

         return response()->json(['message' => 'Avis trouvés', 'Avis' => $review], 200);
     }

    /**
     * Update the specified resource in storage.
     */
    // public function update()
    // {
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if (!$review) {
            return response()->json(['message' => "Aucun avis trouvé"], 404);
        }

        Review::destroy($review->id);
        return response()->json(['message' => 'La avis a été supprimé'], 200);
    }
}
