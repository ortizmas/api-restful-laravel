<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses =  Address::all();
        return response(
            [ 'addresses' => AddressResource::collection($addresses),
                'message' => 'Successfully!!'
            ], 200
        );
    }

    /**
     * Get total registered users by city
     *
     * @return void
     */
    public function getTotalUsersByCity()
    {

        $address = Address::withCount('city', 'user')->with('city', 'user')
            ->get()->groupBy('city_id');
        
        dd($address);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::findOrFail($id);
        return response(
            [
                'address' => new AddressResource($address),
                'message' => 'Successfully'
            ], 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
