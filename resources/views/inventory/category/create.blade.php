@include('layouts.partials.header')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Create Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                 {!! Form::model($itemcategory, ['method' => $itemcategory->exits ? 'PUT' : 'POST',
                'method' => $itemcategory->exists  ? 'PUT' : 'POST',
                'id' => 'form_category_create',
                'route' =>  $itemcategory->exists ? ['categories.update', $itemcategory->id] : 'categories.store',
                'files'=>true
                ]) !!}
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="title" placeholder="Enter Category">
                    </div>

                    <div class="form-group">
                      <label for="name">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"> </textarea>
                    </div>

                    

                    <div class="form-group">
                         <label>Image</label>
                          {{--@if($blogs->file!='')
                                <input type="file" id="dropify" class="dropify" data-default-file=" {{url('images/upload/blog/'.$blogs->file->filepath)}}" name="file">
                          @else--}}
                              <input type="file" id="dropify" class="dropify" data-default-file=" https://cdn.example.com/front2/assets/img/logo-default.png " name="file">

                         {{-- @endif--}}
                               
                    </div>
                    <div class="form-group">
                      <label>Select Parent</label>
                      <select class="form-control select parentcategory" style="width: 100%;" name="parent_id">
                        <option value="">Select Parent</option>
                            @foreach($parentcategory as $cate)
                                    <option value="{{ $cate->recNo }}">{{ $cate->title }}</option>  
                            @endforeach
                  
                      </select>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="submit" class="btn btn-default">Cancel</button>
                    </div>

                  </div>
                {!! Form::close() !!}
              </div>
            </div>

            </div>
          </div>
        </div>
      </section>
  </div>
  <!-- Modal -->
@include('layouts.partials.footer')
  <!-- /.content-wrapper -->
<script>

 $(document).ready(function() {
    $("#form_blog_create").validate({
        rules: {
           name: {
                required: true
            },
            content: {
                required: true
            },
            slug: {
                required: true
            },
        }
    });
    });
</script>

<script>
  $(function () {
    $('#dropify').dropify();
  });
</script>





