<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities =  City::all();
        return response(
            [ 'cities' => CityResource::collection($cities),
                'message' => 'Successfully!!'
            ], 200
        );
    }

    public function show(Request $Request, $id)
    {
        $city = City::findOrFail($id);
        return response(
            [
                'city' => new CityResource($city),
                'message' => 'Successfully'
            ], 200
        );
    }
}
