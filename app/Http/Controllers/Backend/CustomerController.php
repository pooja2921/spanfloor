<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Hash;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Customer $customers,User $users){
         $this->customers = $customers;
         $this->users = $users;
        //parent::__construct();
    }
    public function index()
    {
        try
        {
            $customers = $this->users->orderBy('created_at','DESC')->get();
            return view("backend.customer.index", compact("customers"));
        }catch (Exception $e) {
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
        return view('backend.customer.create')->with('customer',$this->customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            
             /*$validator = $request->validate([
                'name' => 'required',
                'mobile' => 'required|unique:users|min:10|max:12',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password'
            ]);*/
             //dd($validator);
            $request['user_id'] = auth()->user()->id;
            
            $request['password'] = Hash::make($request->password);

            if(isset($request->image))
            {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            
                $imageName = time().'.'.$request->image->extension();  
             
               $request['image']=$request->image->move(public_path('images'), $imageName);

            }
           //return $request->all();
             $customer =$this->users->create($request->except(["_token","password_confirmation","submit"]));
             return redirect()->route('customer.index');
            }catch (Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
        
            $customer = $this->customers->where('id',$id)->first();
            return view('backend.customer.create',compact('customer'))->with('customer', $customer);
        }catch (Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
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
        try {
            //return  $request->all();
            $request['user_id'] = auth()->user()->id;
                
            $request['password'] = Hash::make($request->password);

            if(isset($request->image))
            {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            
                $imageName = time().'.'.$request->image->extension();  
             
               $request['image']=$request->image->move(public_path('images'), $imageName);

            }
           
            $customer =$this->customers->where('id',$id)->update($request->except(["_token","password_confirmation","submit","_method"]));
            return redirect()->route('customer.edit', $id);

        }catch (Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function customerdelete($id)
    {
        try{
            //return $id;
            $deleteuser = $this->customers->where('id',$id)->delete();
            return \Response::json(["status" => "success", "message" => "Customer deleted successfully!", "data" => $id]);
           
        }catch(\Exception $e){
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }

    public function customerchangstatus(Request $request,$id)
    {
        try{
            //return $request;
            $customers = $this->customers->where('id',$id)->update(['status'=>$request['status']]);
           return \Response::json(["status" => "success", "message" => "Customer updated successfully!"]);
        }catch (Exception $e) {
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }

     public function destroy($id)
    {
        //return 'ghgfhxfh';
        try{
           // return $id;
            //return $deleteuser = $this->customers->where('id',$id)->delete();
            return \Response::json(["status" => "success", "message" => "Customer deleted successfully!", "data" => $id]);
           
        }catch(\Exception $e){
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }

}
