<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    public function index()
    {
        $states =  State::all();
        return response(
            [ 'states' => StateResource::collection($states),
                'message' => 'Successfully!!'
            ], 200
        );
    }

    public function show($id)
    {
        $state = State::findOrFail($id);
        return response(
            [
                'state' => new StateResource($state),
                'message' => 'Successfully'
            ], 200
        );
    }
}
