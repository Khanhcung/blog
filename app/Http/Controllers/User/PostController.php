<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\like;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(post $post)
    {	


    	return view('user.post',compact('post'));
    }

    public function getAllPosts(){
    	return $posts=post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
    }
    public function savelike(request $request){
    	$likecheck = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
    	if ($likecheck) {
    		like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
    		return 'deleted';
    	}
    	else{
    		$like = new like;
    		$like->user_id = Auth::id();
    		$like->post_id = $request->id;
    		$like->save();
    	}
    	
    }
    public function liked(request $request)
    {
        $likecheck = like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
        if ($likecheck) {
            return 'liked';
        }
        else{
            return 'not like';
        }
    }
    public function login(){
        return redirect(route('login'));
    }
}
