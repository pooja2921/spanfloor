<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{

    public function __construct(Attribute $attributes)
    {
        $this->attributes=$attributes;
        //parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $attribute= $this->attributes->select('id','name')->get();
         return view('items.attribute',compact('attribute'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
            
            $item=$this->attributes->create($request->except(['_token']));
            \Session::flash('success', 'Sucessfully inserted item');
            return redirect()->back();
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
        //return $id;
         $attribute=$this->attributes->find($id);
         return view('items.edit-attribute',compact('attribute'));
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
        $attr= $this->attributes->where('id',$id)->update($request->except(['_token','_method']));
        return redirect()->route('attribute.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function attributedelete($id){
        $attributes = $this->attributes->where('id',$id)->forceDelete();

        return \Response::json(['status'=>'success', 'message'=>'attributes deleted successfully.']);
    }
    public function destroy($id)
    {
        //
    }
}
