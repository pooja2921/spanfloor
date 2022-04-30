@extends('inventory.layout') 
@section('title', 'Categories')
@section('content')
 @push('head')
  <style>
    .error{
      color: red;
    }
  </style>
  @endpush
    <!-- push external head elements to head --> 
    <div class="container-fluid">
      <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-list bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Categories')}}</h5>
                            <span>Add, remove or edit categories</span>
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
                                <a href="#">{{ __('Categories')}}</a>
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
                <div class="mb-2 clearfix">
                    <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                        {{ __('Display Options')}}
                        <i class="ik ik-chevron-down align-middle"></i>
                    </a>
                    <div class="collapse d-md-block display-options" id="displayOptions">
                        
                        <div class="d-block d-md-inline-block">
                            
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <form action="{{route('categories.index')}}" method="get">
                                    <input type="text" class="form-control" placeholder="Search.." name="name" required>
                                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Category Title">
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Category Code">
                                        </div> -->
                                        <button class="btn btn-theme">{{ __('Search')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="float-md-right">

                    
                            <button class="btn btn-outline-primary btn-rounded-20" href="#categoryAdd" data-toggle="modal" data-target="#categoryAdd">
                                Add Category
                            </button>
                        </div>
                    </div>
                </div>
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">
                    
                    @include('include.message')
                    <!-- end message area-->
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-header"><h3>{{ __('Category')}}</h3></div>
                            <div class="card-body">
                                <table id="user_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name')}}</th>

                                            <th>{{ __('Slug')}}</th>
                                            <th>{{ __('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($parentcategory as $cat)
                                          <tr>
                                            <td>{{ isset($cat->name) ? $cat->name :'' }}</td>
                                            <td>{{ isset($cat->slug) ? $cat->slug :'' }}</td>
                                            
                                            <td><a href="{{ route('categories.show', $cat['id']) }}"><i class="fa fa-eye text-green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="{{ route('categories.edit', $cat['id']) }}"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="javascript:;" class="deletebyid" data-id="{{ isset($cat->id) ? $cat->id:'' }}"  data-url="{{route('categorydelete',$cat['id'])}}"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                          </tr>
                                        @endforeach
                                     
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- category add modal-->
    <div class="modal fade edit-layout-modal pr-0 " id="categoryAdd" tabindex="-1" role="dialog" aria-labelledby="categoryAddLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryAddLabel">{{ __('Add Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="form_category_create" method="POST" action="{{route('categories.store')}}" enctype= multipart/form-data>
                  @csrf
                  <div class="modal-body">
                    <span id="publicurl" data-value="{{url('/')}}"></span>
                      <div class="form-group">
                          <label class="d-block">Category Image</label>
                          <input type="file" name="file" class="form-control">
                      </div>
                      <div class="form-group">
                          <label class="d-block">Category Title</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Category Title">
                      </div>
                      <div class="form-group">
                          <label class="d-block">Slug</label>
                          <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                      </div>
                      <div class="form-group">
                      <label for="d-block">Type</label>
                      <input type="text" class="form-control selecttype" id="type" name="type" placeholder="Enter Type" value="Item">
                      </div>
                      <div class="form-group">
                          <label class="d-block">Parent Category</label>
                          <select data-live-search="true" class="form-control  m_selectpicker parentcategory" name="parent_id">
                              <option value="">Select Parent</option>
                                
                                    @foreach($parentcategory as $cate)
                                        @if($category->exists && $cate->id == $category->parent_id)
                                            <option value="{{ $cate->id }}" selected>{{ $cate->name }}</option>

                                        @else
                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endif
                                    @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="Save" value="Save">
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <!-- category edit modal -->
    <div class="modal fade edit-layout-modal pr-0 " id="categoryView" tabindex="-1" role="dialog" aria-labelledby="categoryViewLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryViewLabel">{{ __('Edit Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="form_category_create" method="POST" action="{{--{{route('categories.update')}}--}}" enctype= multipart/form-data>
                     @csrf
                @method('PUT')
                 
                <div class="modal-body">
                  <span id="publicurl" data-value="{{url('/')}}"></span>
                    <div class="form-group">
                        <label class="d-block">Category Image</label>
                        <input type="file" name="category_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Category Title</label>
                        <input type="text" name="category_title" class="form-control" placeholder="Enter Category Title" value="Computer" >
                    </div>
                    <div class="form-group">
                        <label class="d-block">Category Code</label>
                        <input type="text" name="category_code" class="form-control" placeholder="Enter Category Code" value="CAT12">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Parent Category</label>
                        {<label class="d-block">Parent Category</label>
                        <select class="form-control select2 ">
                            <option selected="selected" value="" data-select2-id="3">Select Category</option>
                            <option value="1">Electronics</option>
                            <option value="3">Smart Home</option>
                            <option value="4">Arts &amp; Crafts</option>
                            <option value="5">Fashion</option>
                            <option value="6">Baby</option>
                            <option value="7">Health &amp; Care</option>
                            <option value="8">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Update" value="Update">
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script src="{{ url('js/jstree.bundle.js')}}" type="text/javascript"></script>
<script src="{{ url('js/treeview.js')}}"></script>
<script src="{{ url('js/selectparentcategory.js')}}"></script>
<script src="{{ url('js/global.js')}}"></script>

<script>

 $(document).ready(function() {
    $("#form_category_create").validate({
        rules: {
           name: {
                required: true
            },
        }
    });
    });

 $(document).ready(function() {
    $('.dropify').dropify();
  });
</script>
 @endpush
 @endsection