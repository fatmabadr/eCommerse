@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit category</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('category.updat')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type='hidden' name="id" value="{{$category->id}}">
                 <div class="row">
                   <div class="col-12">
                    <div class="form-group">
                        <h5>category name in English <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="name_english" class="form-control" value="{{$category->name_english}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>category name in Arabic <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="name" name="name_arabic" class="form-control" value="{{$category->name_arabic}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>

                       <div class="form-group">
                        <h5>category icon<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="icon" class="form-control" value="{{$category->icon}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
