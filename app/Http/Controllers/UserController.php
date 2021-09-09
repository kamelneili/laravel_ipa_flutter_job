<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

use App\Models\user;
use Hash;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return response()->json([
                'message' => "failed"
            ]);
        }

        $token =  $user->createToken($req->device_name)->plainTextToken;
        $this->response['message'] = 'success';
        $this->response['data'] = [
            'token' => $token
        ];

        return response()->json($this->response, 200);
    }
    public function register(Request $request)
    {
       // return $request;
        $user = User::create([
            'phone' => $request['phone'],
            'adr' => $request['adr'],
            'description' => $request['description'],
            'secteur' => $request['secteur'],
            'siteWeb' => $request['siteWeb'],

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return new UserResource($user);
    }

    public function current()
    {
        return new UserResource(auth()->user());
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id()
        ]);
        $user = User::find(auth()->id());
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];

        $user->save();
        return new UserResource($user);
    }
}
