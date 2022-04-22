<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use auth;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\User;
use DB;
use App\Models\ChildProfile;

class ProfileController extends Controller
{
    public function __construct(User $users)
    {
        $this->users = $users;
        
        //parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            //return 'hfgfgjf';
              //return $users = $this->users->with('child')->where('type','customer')->orderBy('created_at','DESC')->get();
              $users=DB::table('users as us')
                 ->select('us.id','cp.id as child_id','us.name as name', 'us.mobile as mobile','us.relation',DB::raw('count(*) as child'))
                 ->LEFTJOIN('child_profiles as cp' ,'cp.user_id' ,'=', 'us.id')
                 ->where('us.type','customer')
                  ->groupBy('us.id')
                 ->orderBy('child', 'desc')
                 ->get();
            return view('backend.profile.index',compact('users'));
        }catch (Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    public function showchild($id)
    {
        //return $id;
        $userschild=ChildProfile::where('user_id',$id)->get();

        return view('backend.profile.show',compact('userschild'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }

    public function delete($id)
    {
        
    }
}
