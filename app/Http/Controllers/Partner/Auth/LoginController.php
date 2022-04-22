<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

    //protected $redirectAfterLogout;
   // protected $redirectTo = 'customer/dashbaord';
    //protected $guard = "customer";

    public function __construct()
    {
        $this->middleware('guest:partner', ['except' => ['logout']]);
    }

    public function showLoginFormCustomer(){
        //return 'gffghfghf';
        return view('partner.auth.login');
    }


	 public function login(Request $request)
    {
        //return $request;
        //
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required',
        'password' => 'required|min:8'
      ]);
      //return Auth::guard("customer");
      // Attempt to log the user in
      if (Auth::guard('partner')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //return $request;
        // if successful, then redirect to their intended location
        return redirect()->intended(route('partner.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('partner')->logout();
        return redirect('/login');
    }

    public function guard(){
        return \Auth::guard($this->guard);
    }
    
   

    

}
