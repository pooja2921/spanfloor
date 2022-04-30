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
                            <h5>{{ isset($parentcategory->name) ? $parentcategory->name:'' }} {{ __('Sub Categories')}}</h5>
                            
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
                                <form action="{{route('categories.search')}}" method="get">
                                    <input type="text" class="form-control" placeholder="Search.." name="name" required>
                                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Category Title">
                                        </div>
                                        
                                        <button class="btn btn-theme">{{ __('Search')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">
                    
                    @include('include.message')
                    <!-- end message area-->
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-header"><h3>{{ isset($parentcategory->name) ? $parentcategory->name:'' }} {{ __('Sub Categories')}}</h3></div>
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
                                        @foreach($category as $cat)
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
    

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<!-- <script src="{{ url('js/jstree.bundle.js')}}" type="text/javascript"></script>
<script src="{{ url('js/treeview.js')}}"></script>
<script src="{{ url('js/selectparentcategory.js')}}"></script> -->
<script src="{{ url('js/global.js')}}"></script>

 @endpush
 @endsection