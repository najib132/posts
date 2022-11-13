<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Resources\PostsResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getAllPosts($limit=null){
    	if($limit !=null and $limit>0){
        	return PostsResource::collection(Post::take($limit)->get());
    	}
    	return PostsResource::collection(Post::all());
    }

    public function getPost($slug){
    	return new PostsResource(Post::whereSlug($slug)->first());
    }
}
