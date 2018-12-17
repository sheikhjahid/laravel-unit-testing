<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Hash;
use App\User;
use App\Http\Requests\PostDataRequest;
class AccessorController extends Controller
{

	// public function __construct()
 //    {
 //        $this->middleware('auth:api', ['except' => ['login']]);
 //    }
 
    public function getPostData()
    {
    	$getData = Post::all();
    	return response()->json([
			'data' => $getData    		
    	], 200);
    }

    public function getPostDataById($id)
    {
    	$getData = Post::find($id);
    	return response()->json([
    		'data' => $getData
    	], 200);
    }

    public function addPostData(PostDataRequest $request)
    {
    	$createPostData = Post::create([
    		'name' => $request->title
    	]);
    	if(!empty($createPostData))
    	{
    		return response()->json([
    			'message' => 'Post data created successfully'
    		], 200);
    	}
    	else
    	{
    		return response()->json([
    			'message' => 'Unable to add post data'
    		], 400);
    	}
    }

    public function updatePostData($id, PostDataRequest $request)
    {	
    	$requestData = [
    		'name' => $request->title
    	];
    	$updatePostData = Post::find($id)->update($requestData);
    	if($updatePostData==1)
    	{
    		return response()->json([
    			'message' => 'Post data updated successfully'
    		], 200);
    	}
    	else
    	{
    		return response()->json([
    			'message' => 'Unable to update post-data'
    		], 400);
    	}
    }

    public function deletePostData($id)
    {
    	$deletePostData = Post::where('id',$id)->delete();
    	if($deletePostData==1)
    	{
    		return response()->json([
    			'message' => 'Post data deleted successfully'
    		], 200);
    	}
    	else
    	{
    		return response()->json([
    			'message' => 'Unable to delete post data'
    		], 400);
    	}
    }

   
}
