<?php

namespace App\Http\Controllers;
use App\Post;
use App\Service;
use App\Slide;
use App\Page;
use App\Message;
use App\Category;

use DB;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
    //	$slides=Slide::oderBy('created_at','desc')->take(3)->get();
    	$slides = DB::table('slides')
                 ->orderBy('created_at', 'desc')->take(3)
                 ->get();
        $services = DB::table('services')
                 ->orderBy('created_at', 'desc')->take(3)
                 ->get();
        $posts = DB::table('posts')
                 ->orderBy('created_at', 'desc')->take(4)
                 ->get();
       return view('site.acceuil',['slides'=>$slides,'services'=>$services,'posts'=>$posts]);
    }

    public function services(){
    	$services = Service::all();
       return view('site.service',['services'=>$services]);
    }

    public function service($id){
    	$service=Service:: find($id);
       return view('site.services',['service'=>$service]);
    }

    public function blog(){
    	$categories=Category::all();
    	$posts =Post::paginate(4); 

       return view('site.blog',['posts'=>$posts,'categories'=>$categories]);
    }

    public function about(){
    	$page = Page::where('slug','propos')->first();
      return view('site.about',['page'=>$page]);
    }

    public function contact(){
       return view('site.contact');    	
    }
//store message
    public function storeContact(Request $request){
    	$data=$request->validate([
	    		'name'     =>'required',
	    		'email'    =>'required|email',
	    		'message'  =>'required|min:5|max:300',
	    	]);
         $message      		 = new Message();
         $message->name		 = $data['name'];
         $message->email 	 = $data['email'];
         $message->message   = $data['message'];
         
         $message->save();
         return redirect('/contact')->with('status',"salut $message->name,votre demande sera dans qlq instants.");
    	
    }

    public function show($slug){

    	$post=Post::where('slug',$slug)->first();
       return view('site.show',['post'=>$post]);    	
    }
    
    public function getPostsOfCategory($slug){
      
    	$category=Category::where('slug',$slug)->first();
    	$posts=$category->posts()->paginate(4);
    	$categories=Category::all();

        return view('site.blog',['posts'=>$posts,'categories'=>$categories]);
    }

}
