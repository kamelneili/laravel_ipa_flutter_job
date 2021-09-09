<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function login(Request $request)
	{
    //return $request;
		try {
			$http = new \GuzzleHttp\Client;

			$response = $http->post('http://localhost/flutter/technoshopapi/public/oauth/token', [
				'form_params' => [
					'grant_type' => 'password',
					'client_id' => '2',
					'client_secret' => '04iasKzRovo6Kh1TxqvOZsui6wX34okPZVUWDxuB',
					'username' => $request->email,
					'password' => $request->password,
					'scope' => '',
				],
			]);
			            // $response->json('message','success');
return response([
            'success'=> 1,
            'successMessageKey' => 'userCreatedSuccessfully' ,
            'data'=>json_decode((string) $response->getBody(), true)
        ]);
			//return  $response->getBody();
		//response()->json('token'=>$response->getBody('access_token'));
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {
			if ($e->getCode() === 400) {
                return response()->json(['ok'=>'0', 'erro'=> 'Invalid Request. Please enter a username or a password.'], $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
		}
	}

	function logout(){
		auth()->user()->tokens->each(function($token){
			$token->delete();
		});
		return response()->json('logout successfully',200);
	}
}
