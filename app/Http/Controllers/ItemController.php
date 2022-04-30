<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\ItemImage;
use Auth;
use DataTables;
use App\Models\Attribute;
use App\Models\ItemDetail;

class ItemController extends Controller
{

    public function __construct(Item $items,Category $category,ItemImage $itemimages,Attribute $attribute,ItemDetail $itemdetail)
    {
        $this->items=$items;
        $this->category=$category;
        $this->itemimages=$itemimages;
        $this->attribute=$attribute;
        $this->itemdetail=$itemdetail;
        //parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$$this->items->get();
        return view('items.items');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getitemlist(){

        $data = Item::get();
        $hasManageUser = Auth::user()->can('manage_user');

        return Datatables::of($data)
            
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                //if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="' . url('items/' . $data->id. '/edit/') . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('items/delete/' . $data->id) . '"  ><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                //}

                return $output;
            })
            ->rawColumns(['action'])
            ->make(true);

    }
    public function create()
    {
        $category= $this->category->whereNull('parent_id')->select('id','name','slug')->get();
        $attribute = $this->attribute->get();
        return view('items.create',compact('category','attribute'))->with('items',$this->items);
    }

    public function getchildcat($id){
        //return $id;
        $category =$this->category->where('parent_id',$id)->select('id','name','slug')->get();
        return $category;
        // return \Response::json(['status'=>'success', 'message'=>'category selected successfully.', 'data'=> $category]);
    }

    public function getsubcat($id){
        //return $id;
        $category =$this->category->where('parent_id',$id)->select('id','name','slug')->get();
        return $category;
    }

    public function getsubchildcat($id){
        //return $id;
        $category =$this->category->where('parent_id',$id)->select('id','name','slug')->get();
        return $category;
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
            if(isset($request->file))
            {

                 $image = $request->file('file');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\item/',$file_name);
                $request['image']= $file_name;
            }
            $item=$this->items->create($request->except(['_token','file','itemimages','attribute','quantity','price','sku','filepath','sale_price','variant']));
            //return $request['itemimages'];
            if(isset($request['itemimages']))
            {
                //return $request['itemimages'];
                foreach ($request['itemimages'] as $galleryimages) {
                   //return $galleryimage;
                    $file_name=  $this->files($galleryimages);
                    $data['item_id'] =$item->id;
                    $data['image'] = $file_name;
                     //return $data;
                    $this->itemimages->create($data);
                }
            }

             $this->ItemDetails($item,$request->all());

            \Session::flash('success', 'Sucessfully inserted item');
            return redirect()->route('items.index');
    }

    public function ItemDetails($item,$request){
        //return $request;
        $detailitem = $this->itemdetail->where('item_id',$item->id)->first();
            
            if(isset($detailitem))
            {
                $this->itemdetail->where('item_id',$item->id)->delete();
            }
            for($i = 0; $i< count($request['variant']); $i++)
            {
                $itemdetails['item_id'] = $item->id;
                $itemdetails['variant'] = $request['variant'][$i];
                $itemdetails['quantity'] = isset($request['quantity'][$i]) ? $request['quantity'][$i] : null;
                $itemdetails['price'] = $request['price'][$i];
                 $itemdetails['sale_price'] =isset($request['sale_price'][$i]) ? $request['sale_price'][$i] : null;
                 $itemdetails['sku'] = isset($request['sku'][$i]) ? $request['sku'][$i] : rand(10000000, 99999999);
                //return $request;
                if($request['variantfile'][$i] != ""){
                     $itemdetails['image'] = $this->file_id_by_url($request['variantfile'][$i]);

                    /*$image = $request->file('variantfile')[$i];
                    $fileInfo = $image->getClientOriginalName();
                    $uniqueId= time().mt_rand();

                    $filename = $uniqueId;
                    $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                    $file_name= $filename.'.'.$extension;
                    $image->move('images\upload\item/',$file_name);
                    $request['image']= $file_name;*/
                }
                //return $itemdetails;
                
                 $this->itemdetail->create($itemdetails);
            }
            
    }

    public  function file_id_by_url($file)
    {
       // return $path;
        /*$base_url = config('filesystems.disks.public_lfm.url')."/";
       return  $file_path = str_replace($base_url,"",$path);*/
                $image = $file;
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\itemthumbnail/',$file_name);
                //$request['image']= $file_name;
                return $data['image'] = $file_name;

    }

    
    public  function files($file){
        //return $file;
                $image = $file;
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\itemthumbnail/',$file_name);
                //$request['image']= $file_name;
                return $data['image'] = $file_name;
                
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

        $items= $this->items->with('category','itemdetail','subcategory','childcategory','imagedetail','itemdetailvariant')->find($id);
        $category= $this->category->whereNull('parent_id')->orwhere('parent_id',0)->with('children')->select('id','name','slug')->get();
        $childcategory= $this->category->whereNotNull('parent_id')->orwhere('parent_id','!=',0)->with('children')->select('id','name','slug')->get();
        $attribute = $this->attribute->get();
        return view('items.edit',compact('category','attribute','items','childcategory'))->with('items',$items);
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

        if(isset($request->file))
            {

                 $image = $request->file('file');
                $fileInfo = $image->getClientOriginalName();
                $uniqueId= time().mt_rand();

                $filename = $uniqueId;
                $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
                $file_name= $filename.'.'.$extension;
                $image->move('images\upload\item/',$file_name);
                $request['image']= $file_name;
            }
            $item=$this->items->where('id',$id)->update($request->except(['_token','_method','file','itemimages','attribute','quantity','price','sku','filepath','sale_price','variant']));

             $item=$this->items->find($id);
            //return $request['itemimages'];
            if(isset($request['itemimages']))
            {
                //return $request['itemimages'];
                foreach ($request['itemimages'] as $galleryimages) {
                   //return $galleryimage;
                    $file_name=  $this->files($galleryimages);
                    $data['item_id'] =$item->id;
                    $data['image'] = $file_name;
                     //return $data;
                    $this->itemimages->create($data);
                }
            }

            $this->ItemDetails($item,$request->all());

            \Session::flash('success', 'Sucessfully updated item');
            return redirect()->route('items.index');
    }

    public function itemdelete($id){
        //return $id;
        $items = $this->items->find($id);
        $image_path = public_path("images\upload\items/".$items->image);  // Value is not URL but directory file path
        if (file_exists($image_path)) {

           @unlink($image_path);

        }
         $items = $this->items->where('id',$id)->forceDelete();
         $items = $this->itemdetail->where('item_id',$id)->forceDelete();

         return redirect('items')->with('success', 'Item removed!');
        return \Response::json(['status'=>'success', 'message'=>'items deleted successfully.']);

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
