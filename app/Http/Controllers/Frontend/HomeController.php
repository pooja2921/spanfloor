<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChildProfile;

class HomeController extends Controller
{
    public function index() 
    {
    	//return 'gfhhfgh';
        return view('index');
    }


    public function profile(){

    	return view('profile');
    }

    public function category(){
		return view('roadmap');
    }

    public function submitprofile(Request $request){
        
        $request['type']='customer';
        //return $request;
        $user= User::create($request->except(['_token']));

        return \Response::json(["status" => "success", "message" => "Blog deleted successfully!", "data" => $user->id]);

    }

    public function childprofile(Request $request){
        //return $request;
        $request['class']=$request->childclass;
            $child= ChildProfile::create($request->except(['_token']));
            return \Response::json(["status" => "success", "message" => "Blog deleted successfully!", "data" => $child->user_id]);
    }

    public function video(){
        return view('video');
    }
    public function siblingprofile(Request $request){
       // return $request;
        $request['class']=$request->sibclass;
            $sib= ChildProfile::create($request->except(['_token']));
            return \Response::json(["status" => "success", "message" => "Blog deleted successfully!", "data" => $sib->id]);
    }
}
