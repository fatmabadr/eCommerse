@extends('Admin.admin_master')
@section('mainContent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Admin Data</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('admin.save.edits')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                 <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                        <h5>Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="name" class="form-control" value="{{$adminData->name}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>Email Field <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="email" name="email" class="form-control" value="{{$adminData->email}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="photoDirectory" type="file"  id="image">
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id ="showImage"src="{{!empty($adminData->photoDirectory)? '/backend/admin/profileImages/'.$adminData->photoDirectory : ('/backend/images/user3-128x128.jpg')}}" alt="avatar-5" class="rounded avatar-lg">
@if (!empty($adminData->photoDirectory))
                            <a href="{{route('deleteImage')}}" type="button" class="btn btn-success mb-5">Delete Image</a>
                        </div>
@endif



@if(Session::has('succ'))
<div class="alert alert-danger" role="alert">
    {{Session::get('succ')}}
    @endif
</div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Save Data</button>               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>




<script type="text/javascript">

    $(document).ready(function(){

    $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });

    });


        </script>

   @endsection
