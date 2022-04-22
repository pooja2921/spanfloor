<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\ControllerHelpers\UploadHelper;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $users){
         $this->users = $users;
        //parent::__construct();
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        try{
                $userid=auth()->user()->id;
            $user = $this->users->where('id',$id)->first();
            return view('backend.user.profile',compact('user','userid'));
        }catch (Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       // return $id;

        if(isset($request->image))
        {
        $request['file']= UploadHelper::file_upload($request->image);
        }

        $user =$this->user->where('id',$id)->
        update($request->except(["_token","image","submit","category_id"]));
    }

    public function userupdate(Request $request)
    {
        try{
            //return $request;
            $request['password'] = Hash::make($request->password);
            if(isset($request->image))
            {
             $request['file']= UploadHelper::file_upload($request->image);
            }
            //return $request['file'];
             $user =$this->users->where('id',$request->id)->update($request->except(["_token","image","submit"]));
        return \Response::json(["status" => "success", "message" => "User Updated successfully!", "data" => $request->id]);
           
        }catch(\Exception $e){
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
