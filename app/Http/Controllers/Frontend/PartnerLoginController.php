<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerLoginRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\Partner;
use App\Models\Product;

class PartnerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginregiter(){
        return view('login');
    }

    public function requestpickup(){
        return view('pickup');
    }
    public function pricelist(){
        $eappproduct= Product::where('status','active')->where('category_id',1)->get();
        $paperproduct= Product::where('status','active')->where('category_id',2)->get();
        $ewasteproduct= Product::where('status','active')->where('category_id',3)->get();
        $metalsproduct= Product::where('status','active')->where('category_id',4)->get();
        $plasticproduct= Product::where('status','active')->where('category_id',5)->get();
        $otherproduct= Product::where('status','active')->where('category_id',6)->get();
        return view('pricelist',compact('eappproduct','paperproduct','ewasteproduct','metalsproduct','plasticproduct','otherproduct'));
    }
    public function tieup(){
        return view('tieup');
    }
    

    public function partnerregister(PartnerLoginRequest $request) 
    {
        //return $request;
        $partner = Partner::create($request->validated());

        auth()->login($partner);

        return redirect()->route('/')->with('success', "Account successfully registered.");
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
        //
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
