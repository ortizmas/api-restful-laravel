<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response(
            [
                'users' => UserResource::collection($users),
                'message' => "Successful!!"
            ], 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Error na validação']);
        }

        $user = User::create($data);

        $request['user_id'] = $user->id;
        $data_address = $request->except('name', 'email', 'password');
        $address = Address::create($data_address);

        return response([
            'user' => new UserResource($user),
            'address' => new AddressResource($address),
            'message' => 'Dados cadastrados com sucesso!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = $request->all();


        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Error na validação']);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return response([
            'user' => new UserResource($user),
            'message' => 'Dados atualizados com sucesso!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        //$user->delete();
        return response(['message' => 'Usuario excluido!!']);
    }
}
