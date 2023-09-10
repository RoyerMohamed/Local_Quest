<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Region::count() === 0) {
            return response()->json(['message' => "Aucun Region trouvé"], 404);
        }

        return response()->json(['message' => 'Region trouvé', 'Region' => Region::all()], 200);
    }







}
