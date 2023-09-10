<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Department::count() === 0) {
            return response()->json(['message' => "Aucun departement trouvé"], 404);
        }

        return response()->json(['message' => 'departements trouvé', 'Departement' => Department::all()], 200);
    }

}
