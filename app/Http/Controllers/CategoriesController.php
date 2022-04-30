<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use validator;
use App\Http\Requests\CategoryRequest;
use App\ControllerHelpers\BaumHelper;
use auth;
use App\ControllerHelpers\GeneralHelper;

class CategoriesController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category=$category;
        //parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
            //return $request;
            if($request->name!=''){
                $parentcategory = $this->category->where('name','like', '%'.$request->name.'%')->select('id','name','slug')->get();
            }
            else{
                $parentcategory = $this->category->whereNull('parent_id')->orwhere('parent_id',0)->select('id','name','slug')->get();
            }
                $children = $this->category->whereNotNull('parent_id')->get();
                $categories = $this->category->categoryTree('Item');
                return view('inventory.category.index',compact('parentcategory','children','categories'))->with('category',$this->category);
        }
        catch (Exception $e) {
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
        //return $request->all();
        try
        {
          
            if(isset($request->file))
            {

                 $image = $request->file('file');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\category/',$file_name);
                $cate_data['image']= $file_name;
            }
             
        
            //return $cate_data;
                $cate_data['parent_id'] = $request['parent_id'];
                $singlename = GeneralHelper::replaceStringAndExplode($request['name']);

                foreach($singlename as $k => $categoryname)
                {
                    $cate_data['name'] = $categoryname;
                    $cate_data['slug'] = $categoryname;
                    $cate_data['type']=$request['type'];
                    //$cate_data['user_id'] = auth()->user()->id;
                    //return $cate_data;
                    $category = $this->category->create($cate_data);
                    // return $request->parent_id;
                    if($request->parent_id == null || $request->parent_id == 0){
                         $category->makeRoot();
                    } else{
                         $category->makeChildOf($request->parent_id);
                    }
                }

            \Session::flash('success', ' Sucessfully inserted your data');
            return redirect()->route('categories.index');
        }
        catch (Exception $e) {
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

    public function CategoryAdd($request)
    {
        //return $request['file'];
        $data=[];
        
        $data['user_id'] = auth()->user()->id;

        return $data;

    }
    public function show($id)
    {
        //return $id;
        $parentcategory =$this->category->where('id',$id)->select('id','name')->first();
        $category =$this->category->where('parent_id',$id)->with('children')->get();
         return view('inventory.category.show',compact('parentcategory','category'));
    }

    public function search(Request $request)
    {
        //return $request;
        
        if($request->name!=''){

             $category = $this->category->where('name','like', '%'.$request->name.'%')->select('id','name','slug','parent_id')->get();
            $parentcategory =$this->category->where('id',$category[0]['parent_id'])->select('id','name')->first();
        }
        
        
         return view('inventory.category.show',compact('parentcategory','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            //return $id;
            $category =$this->category->where('id',$id)->first();
            $parentcategory = $this->category->select('id','name','type')->where('type',$category->type)->get();
            $category_types = $this->category->get(["type"]);
            $children = $this->category->children()->get();
            
            return view('inventory.category.edit',compact('category_types','parentcategory'))->with('category',$category);
        }
        catch (Exception $e) {
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
        //return $request;
        if(isset($request->image))
        {

                 $image = $request->file('image');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\category/',$file_name);
                $cate_data['image']= $file_name;
            }
             
        

                $cate_data['parent_id'] = $request['parent_id'];
                $singlename = GeneralHelper::replaceStringAndExplode($request['name']);

                foreach($singlename as $k => $categoryname)
                {
                    $cate_data['name'] = $request['name'];
                    $cate_data['slug'] = $categoryname;
                    $cate_data['type']=ucfirst($request['type']);
                    //$cate_data['user_id'] = auth()->user()->id;
                    //return $cate_data;
                    $category = $this->category->where('id',$id)->update($cate_data);
                    // return $request->parent_id;
                    $category = $this->category->find($id);
                    if($request->parent_id != $category->parent_id){
                        if($request->parent_id == null || $request->parent_id == 0){
                         $category->makeRoot();
                    } else{
                         $category->makeChildOf($request->parent_id);
                    }
                }
                }

            \Session::flash('success', ' Sucessfully updated your data');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function categorydelete($id){
        //return $id;
        $category = $this->category->find($id);
        $image_path = public_path("images\upload\category/".$category->image);  // Value is not URL but directory file path
        if (file_exists($image_path)) {

           @unlink($image_path);

        }
         $category = $this->category->where('id',$id)->forceDelete();

        return \Response::json(['status'=>'success', 'message'=>'category deleted successfully.']);

    }
    public function destroy($id)
    {
        //
    }

    public function getSelectedCategory(Request $request){
        try
        {
            // return 'demo';
            // return $request->all();
            $allcategories = [];
            $parentcategory = $this->category->where('parent_id',null)->where('type', $request->type)->get();
            if(isset($parentcategory)){
                foreach($parentcategory as $categories)
                {
                    $allcategories[]= $categories->getDescendantsAndSelf();
                }
                return $allcategories ;
            }
            else
            {
                return $allcategories ;
            }
        }
        catch(\Exception $e)
        {
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }
}
