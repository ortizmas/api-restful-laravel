<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $collection = collect(Address::all()->load('city'));
        $totalUserByCities = $collection->totalUserByCitiesBy('city_id')->map(
            function ($row) {
                return [
                    'city' => $row[0]->city->name,
                    'total_users' => $row->count()
                ];
            }
        );

        return response(new AddressResource($totalUserByCities));
    }

    /**
     * Get total registered users by city
     *
     * @return void
     */
    public function getTotalUsersByState()
    {
        $collection = collect(Address::all()->load('city'));
        $totalUserByState = $collection->totalUserByStateBy('state_id')->map(
            function ($row) {
                return [
                    'state' => $row[0]->state->name,
                    'total_users' => $row->count()
                ];
            }
        );

        return response(new AddressResource($totalUserByState));
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
