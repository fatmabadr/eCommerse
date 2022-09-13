@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit slider</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('slider.updat')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type='hidden' name="id" value="{{$slider->id}}">
                 <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                        <h5>slider title <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="title" class="form-control" value="{{$slider->title}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>slider description <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="name" name="description" class="form-control" value="{{$slider->description}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">slider image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="slideImage" type="file"  id="image">
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id ="showImage"src="{{!empty($slider->slideImage)? '/backend/admin/slider/'.$slider->slider_img : ('')}}" alt="avatar-5" class="rounded avatar-lg">




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
