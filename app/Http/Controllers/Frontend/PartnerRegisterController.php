<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Http\Requests\PartnerLoginRequest;

class PartnerRegisterController extends Controller
{
    public function register(PartnerLoginRequest $request){


    	$partner = Partner::create($request->validated());

        //auth()->login($partner);

        return redirect()->back()->with('success', "Account successfully registered.");
    }
}
