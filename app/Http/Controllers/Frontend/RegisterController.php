<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
	/**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
    */

     public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
    	//return $request;
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
