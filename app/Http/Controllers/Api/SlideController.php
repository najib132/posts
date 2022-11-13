<?php

namespace App\Http\Controllers\Api;

use App\Slide;
use App\Http\Resources\SlidersResource; 
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function getAllSliders($limit=null){
    	if($limit !=null and $limit>0){
        	return SlidersResource::collection(Slide::take($limit)->get());
    	}
    	return SlidersResource::collection(Slide::all());
    }

    public function getSlider($id){
    	return new SlidersResource(Slide::find($id)); 
    }

}
