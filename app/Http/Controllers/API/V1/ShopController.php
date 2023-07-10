<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ShopResouce; 
use App\Http\Resources\V1\ShopCollection; 

class ShopController extends Controller
{
    /**
     * returns all shops
     */
    public function index(Request $request)
    {
        // creating a new filter
       // $filter = new ShopQuery();  
        // formating the filter to array 
        //$queryItems = $filter->transform($request); //[['tabl']]
        //Shop::where($filter)->paginate(); 

        return new ShopCollection(Shop::paginate());
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
    public function show(Shop $shop)
    {
        return new ShopResouce($shop);
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
    public function destroy(string $id)
    {
        //
    }
}
