<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserDataRequest;
use App\User;
use Hash;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
// use Illuminate\Http\Response as HttpResponse;
class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

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

    public function login(Request $request)
    {
        // grab credentials from the request
       $credentials = $request->only(['email', 'password']);

       if (!$token = JWTAuth::attempt($credentials)) 
       {
         return response()->json(false);
       }
         return response()->json(['message' => 'User logged-in']);
    }

    public function getLoggedInUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function getUserData()
    {
        $userData = User::all();
        if(!empty($userData))
        {
            return response()->json([
                'status' => 'success',
                'data' => $userData
            ], 200);      
        }
        else
        {
            return response()->json([
                'status' => 'failure',
                'message' => 'User data found empty'
            ], 404);
        }
              
    }

    public function getUserDataById($id)
    {
        $userData = User::find($id);
        if(!empty($userData))
        {
            return response()->json([
                'status' => 'success',
                'data' => $userData
            ], 200);      
        }
        else
        {
            return response()->json([
                'status' => 'failure',
                'message' => 'User data found empty'
            ], 404);
        }
    }

    public function updateUserData($id, UserDataRequest $request)
    {
        $requestData = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $updateUserData = User::where('id',$id)->update($requestData);
        if($updateUserData==1)
        {
            return response()->json([
                'message' => 'UserData updated successfully'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Unable to update userdata'
            ], 400);
        }
    }

    public function deleteUserData($id)
    {
        $deleteUserData = User::find($id)->delete();
        if($deleteUserData==1)
        {
            return response()->json([
                'message' => 'User data deleted'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Unable to delete userdata'
            ], 400);
        }
    }

    public function logout()
    {
    	$token = JWTAuth::parseToken()->invalidate();;
    	return response()->json([
    		'message' => 'User logged out successfully',
    	]);
    }

}
