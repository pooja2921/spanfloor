<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogCategory;
use auth;
use App\ControllerHelpers\UploadHelper;
use App\Models\File;

class BlogController extends Controller
{
    public function __construct(Blog $blogs,Category $category,BlogCategory $blogcategory)
    {
        $this->blogs = $blogs;
        $this->category = $category;
        $this->blogcategory = $blogcategory;
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
             $blogs = $this->blogs->where('active',1)->orderBy('created_at','DESC')->get();
            return view('backend.blog.index',compact('blogs'));
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
        
        $userid=auth()->user()->id;
        $categories = $this->category->categoryTree('Blog');
        return view('backend.blog.create',compact('categories','userid'))->with('blogs',$this->blogs);
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

            $request['user_id'] = auth()->user()->id;
            $request['active'] = 1;
            isset($request->submit) && $request->submit == 'submit' ? $request['status'] = 'published' : $request['status'] = 'draft';
            if($request['slug'] !='')
            {
                $request['slug'] = $request['slug'];
            }
            
            /*if(isset($request->image))
            {
                $request['file']= UploadHelper::file_upload($request->image);
            }*/
            if(isset($request->file))
            {
                $image = $request->file('file');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\blog/',$file_name);

                $imageUpload = new File();
                $imageUpload->filepath = $file_name;
                $imageUpload->save();
                //return $imageUpload;
                //$request['image_id']= UploadHelper::file_upload_brand($request->image);
            }
            //return $imageUpload;
            $request['file_id']=$imageUpload->id;

            //return $request;
            $blogs =$this->blogs->create($request->except(["_token","image","submit","category_id","file"]));

            if(isset($request->category_id)){
                $cat = explode(',', $request->category_id);
                foreach ($cat as $key => $value) {
                    $blogcategory['blog_id'] = $blogs->id;
                    $blogcategory['category_id'] = $value;

                    $this->blogcategory->create($blogcategory);
                }
            }

            return redirect()->route('blog.index');
        
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
            $blogs =$this->blogs->where('id',$id)->with('file')->first();
            $selectedCategories = $this->blogcategory->where('blog_id',$id)->get();

             $categories = $this->category->categoryTreeSelected('Blog',$selectedCategories);
           
            return view('backend.blog.create',compact('categories'))->with('blogs',$blogs);
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
         $request['user_id'] = auth()->user()->id;
            $request['active'] = 1;
            isset($request->submit) && $request->submit == 'submit' ? $request['status'] = 'published' : $request['status'] = 'draft';
            if($request['slug'] !='')
            {
                $request['slug'] = $request['slug'];
            }
            
            if(isset($request->file))
            {
                $image = $request->file('file');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\blog/',$file_name);

                $imageUpload = new File();
                $imageUpload->filepath = $file_name;
                $imageUpload->save();
                //return $imageUpload;
                //$request['image_id']= UploadHelper::file_upload_brand($request->image);
            }
            //return $imageUpload;
            $request['file_id']=$imageUpload->id;
            $blog = $this->blogs->where('id',$id)->update($request->except(["_token","submit","_method","image","category_id","file"]));

            if(isset($request->category_id))
            {
                $this->blogcategory->where('blog_id',$id)->delete();
                $cat = explode(',', $request->category_id);
                foreach ($cat as $key => $value) {
                    $blogcategory['blog_id'] = $id;
                    $blogcategory['category_id'] = $value;
                    $this->blogcategory->create($blogcategory);
                }
            }
        return redirect()->route('blog.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $id;
        try{
            
            $deleteuser = $this->blogs->where('id',$id)->delete();
            return redirect()->route('blog.index');
           
        }catch(\Exception $e){
            \Session::flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    public function changstatus(Request $request,$id)
    {
        try{
            //return $request;
            $blog = $this->blogs->where('id',$id)->update(['status'=>$request['stat']]);
           return \Response::json(["status" => "success", "message" => "Blog updated successfully!"]);
        }catch (Exception $e) {
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try{
           // return $id;
             $deleteuser = $this->blogs->where('id',$id)->delete();
            return \Response::json(["status" => "success", "message" => "Blog deleted successfully!", "data" => $id]);
           
        }catch(\Exception $e){
            return \Response::json(["status" => "danger", "message" => $e->getMessage()]);
        }
    }
}
