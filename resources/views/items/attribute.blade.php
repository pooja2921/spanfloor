@extends('inventory.layout') 
@section('title', 'Attribute')
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
                            <h5>{{ __('Attribute')}}</h5>
                            <span>Add, remove or edit Attribute</span>
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
                                <a href="#">{{ __('Attribute')}}</a>
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
                                {{-- <form action="{{route('categories.index')}}" method="get">
                                    <input type="text" class="form-control" placeholder="Search.." name="name" required>
                                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Category Title">
                                        </div>
                                        
                                        <button class="btn btn-theme">{{ __('Search')}}</button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div class="float-md-right">

                    
                            <button class="btn btn-outline-primary btn-rounded-20" href="#categoryAdd" data-toggle="modal" data-target="#categoryAdd">
                                Add Attribute
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
                            <div class="card-header"><h3>{{ __('Attribute')}}</h3></div>
                            <div class="card-body">
                                <table id="user_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name')}}</th>
                                            <th>{{ __('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attribute as $attr)
                                          <tr>
                                            <td>{{ isset($attr->name) ? $attr->name :'' }}</td>
                                            
                                            
                                            <td>
                                             <a href="{{ route('attribute.edit', $attr['id']) }}"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="javascript:;" class="deletebyid" data-id="{{ isset($attr->id) ? $attr->id:'' }}"  data-url="{{route('attributedelete',$attr['id'])}}"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
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
                    <h5 class="modal-title" id="categoryAddLabel">{{ __('Add Attribute')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="forms-sample" method="POST" action="{{ route('attribute.store') }}" enctype= multipart/form-data>
                @csrf
                    <div class="modal-body">
                    <span id="publicurl" data-value="{{url('/')}}"></span>
                      <div class="form-group">
                          <label for="title">Title<span class="text-red">*</span></label>
                            <input id="title" type="text" class="form-control" name="name" value="" placeholder="Enter title" required="">
                                                
                      </div>
                      
                      <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="Save" value="Save">
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

@push('script')
<script src="{{ url('js/global.js')}}"></script>
 @endpush
 @endsection