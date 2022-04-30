@extends('inventory.layout') 
@section('title', 'Edit Items')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Edit Items')}}</h5>
                            <span>{{ __('Create new Items')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('EditF Items')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Add Items')}}</h3>
                    </div>
                    <div class="card-body">
                       
                    <form class="forms-sample" method="POST" action="{{ route('items.update',$items->id) }}" enctype= multipart/form-data>
                        @csrf
                        @method('PUT')
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="d-block">Parent Category</label>
                                        <select  class="form-control parentcat" name="category_id" data-url="{{url('/')}}">

                                        <option value="">Select Category</option> 
                                          @foreach($category as $cat)
                                            <option value="{{$cat->id}}" {{ isset($cat->id) && $cat->id == $items->category_id ? 'selected' :''}}>{{$cat->name}}</option> 
                                          @endforeach
                            
                                        </select>
                                    </div>
                                    <div class="form-group subcategory">
                                        <label class="d-block">Sub Category</label>
                                        <select  class="form-control subcat" name="subcategory_id" data-url="{{url('/')}}">

                                        <option value="">Select Category</option> 
                                          @foreach($category as $cat)
                                          @foreach($cat->children as $subcat)
                                            <option value="{{$cat->id}}" {{ isset($subcat->id) && $subcat->id == $items->subcategory_id ? 'selected' :''}}>{{$subcat->name}}</option> 
                                          @endforeach
                                          @endforeach
                            
                                        </select>
                                    </div>
                                    <div class="form-group childcategory" >
                                        <label class="d-block">child Category</label>
                                        <select  class="form-control childcat" name="childcategory_id" data-url="{{url('/')}}">

                                        <option value="">Select Category</option> 
                                          @foreach($childcategory as $cat)
                                          @foreach($cat->children as $child)
                                            <option value="{{$child->id}}" {{ isset($child->id) && $child->id == $items->childcategory_id ? 'selected' :''}}>{{$child->name}}</option> 
                                          @endforeach
                                            @endforeach
                            
                                        </select>
                                    </div>
                                    
                                    <div class="itemform">
                                        <div class="form-group">
                                            <label for="title">Title<span class="text-red">*</span></label>
                                            <input id="title" type="text" class="form-control" name="name" value="{{isset($items->name) ? $items->name :''}}" placeholder="Enter title" required="">
                                            <div class="help-block with-errors"></div>


                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control html-editor h-205" name="description" rows="10">{{$items->description}}</textarea>

                                        </div>

                                        <div class="form-group">
                                            <label>Item Images</label>
                                             <div class="input-images" data-input-name="itemimages" data-label="Drag & Drop  images here or click to browse"></div>
                                            @if(isset($items->imagedetail))
                                                @foreach($items->imagedetail as $gallerydetail)
                                                <img class='thumbnail' src="{{ url('images/upload/itemthumbnail/'.$gallerydetail['image'])}}" style="width: 30%"/>
                                               
                                                @endforeach
                                            
                                            
                                            @endif
                                        </div>
                                    </div>
                                    
                                    </div>

                                    <div class="col-sm-4 formitm">

                                        <div class="form-group">
                                            <label for="price">Image</label>
                                            @if(isset($items->image))
                                            <img class='thumbnail' src="{{ url('images/upload/item/'.$items['image'])}}" style="width: 30%"/>
                                            @endif
                                            <input type="file" id="dropify" class="dropify" data-default-file=" https://cdn.example.com/front2/assets/img/logo-default.png " name="file">
                                        </div>

                                        <div class="form-group">
                                            <label for="available">Available<span class="text-red">*</span></label>
                                            <input id="available" type="text" class="form-control" name="available" value="{{isset($items->available) ? $items->available  :''}}" placeholder="Enter Available Size" required="">
                                            <div class="help-block with-errors"></div>
                                        </div>

                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h4 class="kt-portlet__head-title">
                                            <i class="la la-file-text-o"></i>
                                            Variants
                                        </h4>
                                    </div>
                                    <div class=" kt-portlet__head-toolbar">
                                        
                                    </div>
                                    <div id="veriants_show" >
                                        <div class="kt-portlet__body">
                                        <p class="variants_creat_msg"></p>
                                        <input type="hidden" class="all_attribute" data-attribute="{{isset($attribute) && $attribute !='' ? $attribute : ''}}">
                                        <table id="myTable" class="variants-list table ">
                                            <tbody>
                                                @if(isset($items->variant_option))
                                                @foreach(json_decode($items->variant_option) as $key=> $variant)
                                                    <tr id="{{ $loop->index +1 }}">
                                                        <td style="width: 40%;">
                                                            <select class="form-control attributes" >
                                                                @if(isset($attribute) && $attribute !='')
                                                                    @foreach($attribute as $attri)
                                                                        <option value="{{ $attri->id }}"  {{ isset($variant->type) && $variant->type == $attri->id ? 'selected' :''}}>{{ $attri->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                                
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="kt_tagify tags_{{ $loop->index +1 }}" placeholder="Add varitation" value="{{ isset($variant->value) && $variant->value!='' ? json_encode($variant->value):'' }}">
                                                        </td>
                                                        <td width="8%"> <label></label>
                                                            <a href="javascript:;" data-count_val="{{ $loop->index +1 }}" class="btn btn-outline-hover-danger btn-elevate btn-circle btn-icon optiondelete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                
                                                <tr>
                                                    <td style="text-align: left;width: 20px;">
                                                        <textarea name="variant_option" id="all_variant_option" class="variant_option" style="display: none">{{ isset($items->variant_option) && $items->variant_option!='' ? $items->variant_option:'' }}</textarea>
                                                        <input type="button" id="addrow" value="Add another option" class="btn btn-info addrow"/>
                                                    </td>
                                                    
                                                </tr>
                                            </tfoot>
                                        </table>
                                        </div>
                                    </div>
                
                                <div class="kt-portlet kt-portlet--mobile variant_preview">
                            
                                    <div class="kt-portlet__head kt-portlet__head--lg">
                                        <div class="kt-portlet__head-label">
                                            <span class="kt-portlet__head-icon">
                                                <i class="kt-font-brand flaticon2-line-chart"></i>
                                            </span>
                                            <h3 class="kt-portlet__head-title">
                                                Preview
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="kt-portlet__body">
                                        <input type="hidden" class="all_units" data-weight="{{isset($units) && $units !='' ? $units : ''}}">
                                        <!--begin: Datatable -->
                                        <div class="variant_table">
                                        <p class="variants_price_msg"></p>
                                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2" style="width: 135%;" >
                                            <thead>
                                                <th>Image</th> 
                                                <th>Variant</th>
                                                <th >Price<span style="color:red;">*</span></th>
                                                <th>Discounted Price</th>
                                                <th>Quantity</th>
                                                <th>SKU</th>
                                                
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @if(isset($items->itemdetailvariant) && $items->itemdetailvariant !='')
                                                    @foreach($items->itemdetailvariant as $key => $product_variant)
                                                        <tr data-combo="{{$product_variant->variant}}">
                                                            <td>
                                                                <div class="kt-avatar kt-avatar--outline kt-avatar--danger" id="kt_user_avatar_4_{{($product_variant->variant)}}">
                                                                    <a href="#" id="lfm_{{($product_variant->variant)}}" data-input="thumbnail_{{($product_variant->variant)}}" data-preview="holder_{{($product_variant->variant)}}">
                                                                        
                                                                        <input type="file" id="dropify" class="dropify" data-default-file="{{ url('images/upload/itemthumbnail/'.$product_variant->image)}}" style=";width:70px;height:65px;background-repeat: no-repeat;background-size: 65px 65px;" name="variantfile[]">
                                                                        
                                                                        </div>
                                                                    </a>
                                                                    <span class="kt-avatar__cancel avatar_cancel_{{($product_variant->variant)}}" data-toggle="kt-tooltip" style="display:flex;" title="" data-original-title="Cancel avatar">
                                                                        <i class="fa fa-times"></i>
                                                                    </span>
                                                                    <input id="thumbnail_{{($product_variant->variant)}}" class="form-control lfm_val_{{ $loop->index +1 }}" data-lfm_val="{{($product_variant->variant)}}" type="text" name="filepath[]" value="" style="display:none" >
                                                                </div>
                                                            </td>
                                                            <td> {{$product_variant->variant}}
                                                                <input type="hidden" class="form-control" name="variant[]" value="{{$product_variant->variant}}">
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control number variant_price_{{ $key }}" placeholder="0.00" name="price[]" value="{{$product_variant->price}}">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control number" placeholder="0.00" name="sale_price[]" value="{{isset($product_variant->sale_price) ? $product_variant->sale_price:''}}">
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control" placeholder="0" name="quantity[]" value="{{isset($product_variant->quantity)?$product_variant->quantity:''}}"></td>
                                                            <td><input type="text" class="form-control" placeholder="SKU" name="sku[]" value="{{isset($product_variant->sku) ? $product_variant->sku:''}}" ></td>
                                                            
                                            
                                                            <td> <i class="ik ik-trash-2 f-16 text-red combinationdelete"></i></td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                        </div>
                                        <!--end: Datatable -->
                                    </div>
                                </div> 
                                </div>

                                        
                                    </div>
                            

                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 

    <script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<script src="{{url('js/tagify.bundle.js')}}"></script> 
    <script src="{{url('js/item_custom.js')}}"></script>
    <!-- <script>
        $(document).on('change', '.subchildcat', function() {
            $('.itemform').css("display", "block");
            $('.formitm').css("display", "block");
            
        });
    </script> -->
    @endpush
@endsection
