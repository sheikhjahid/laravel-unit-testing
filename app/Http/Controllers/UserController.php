<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserDataRequest;
use App\User;
use Hash;
use Auth;
use JWTAuth;
class UserController extends Controller
{

	public function addUserData(UserDataRequest $request)
    {
    	$requestData = [
    		'name' => $request->username,
    		'email' => $request->email,
    		'password' => Hash::make($request->password)
    	];

    	$createUserData = User::create($requestData);
    	if(!empty($createUserData))
    	{
    		return response()->json([
    			'message' => 'Created user-data'
    		], 200);
    	}
    	else
    	{
    		return response()->json([
    			'message' => 'Unable to create user-data'
    		], 400);
    	}
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only(['email', 'password']);

    //     if (!$token = JWTAuth::attempt($credentials)) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }
    //     return response()->json([
    //     	'message' => 'User logged-in successfully',
    //         'user_details' => Auth::user(),
    //         'access_token' => $token
    //     ]);	
    // }

    // public function logout()
    // {
    // 	$token = JWTAuth::parseToken()->invalidate();;
    // 	return response()->json([
    // 		'message' => 'User logged out successfully',
    // 	]);
    // }

}
