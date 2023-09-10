<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpeningHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (OpeningHour::count() === 0) {
            return response()->json(['message' => 'Pas de horaire trouvé'], 404);
        }

        return response()->json(['message' => 'l\'horaire trouvé', 'horaire' => OpeningHour::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "day"                      => 'string|required',
                "morning_opening_hour"     => 'date_format:H:i|required',
                "morning_closing_hour"     => 'date_format:H:i|nullable',
                "afternoon_opening_hour"   => 'date_format:H:i|nullable',
                "afternoon_closing_hour"   => 'date_format:H:i|required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],400);
        }

        $openingHour = OpeningHour::create($request->all());

        return response()->json(['message' => 'L\'horaire a été ajouté ', 'horaire' => $openingHour],200);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, OpeningHour $openingHour)
    {

        if (!$openingHour) {
            return response()->json(['message' => 'Pas d\'horaire trouvée'], 401);
        }

        $validator = Validator::make(
            $request->all(),
            [
                "day"                      => 'string|required',
                "morning_opening_hour"     => 'date_format:H:i|required',
                "morning_closing_hour"     => 'date_format:H:i|nullable',
                "afternoon_opening_hour"   => 'date_format:H:i|nullable',
                "afternoon_closing_hour"   => 'date_format:H:i|required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $openingHour->update($request->all());

        return response()->json(['message' => 'les horaires ont été modifiés', 'Horaires' => $openingHour], 200);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
     public function destroy(OpeningHour $openingHour)
     {
         if (!$openingHour) {
             return response()->json(['message' => 'Pas d\'horaire trouvé'], 404);
         }

         OpeningHour::destroy($openingHour->id);
         return response()->json(['message' => 'L\'horaire a été supprimé '], 200);
     }
}
