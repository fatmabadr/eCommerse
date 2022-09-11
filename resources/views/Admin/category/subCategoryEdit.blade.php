@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit sub Category</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('subCategory.updat')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type='hidden' name="id" value="{{$subcategory->id}}">
                 <div class="row">
                   <div class="col-12">

                    <div class="form-group">
                        <h5>category Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" required class="form-control">
                                <option value=""> </option>
                                @foreach ($allCategories as $Category)
                                <option value="{{$Category->id}}" {{$Category->id ==$subcategory->category_id ? 'selected' : ''}}>{{$Category->name_english}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <h5>subcategory name in English <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="name_english" class="form-control" value="{{$subcategory->name_english}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>sub category name in Arabic <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="name" name="name_arabic" class="form-control" value="{{$subcategory->name_arabic}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
