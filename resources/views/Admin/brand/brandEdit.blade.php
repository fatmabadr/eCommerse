@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Brand</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('brand.updat')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type='hidden' name="id" value="{{$brand->id}}">
                 <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                        <h5>Brand name in English <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="name_english" class="form-control" value="{{$brand->name_english}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>Brand name in Arabic <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="name" name="name_arabic" class="form-control" value="{{$brand->name_arabic}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">brand image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="image" type="file"  id="image">
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id ="showImage"src="{{!empty($brand->image)? '/backend/admin/brandImages/'.$brand->image : ('/backend/admin/brandImages/user3-128x128.jpg')}}" alt="avatar-5" class="rounded avatar-lg">
@if (!empty($brand->iamge))
                            <a href="" type="button" class="btn btn-success mb-5">Delete Image</a>
                        </div>
@endif



              </div>

                        <input type="submit" class="btn btn-primary mb-5" value="Edit">               </form>

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
