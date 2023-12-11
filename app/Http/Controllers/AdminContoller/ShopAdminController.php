<?php

namespace App\Http\Controllers\AdminContoller;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (Shop::count() === 0) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        return response()->json(['message' => 'Commerçants trouvé', 'Commerçants' => Shop::latest()->get()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);    
        if (!$shop) {
            return response()->json(['message' => 'Aucun commerçant trouvé'], 404);
        }

        Shop::destroy($shop->id);
        return response()->json(['message' => 'Le commerçants a été supprimé '], 200);
    }
}
