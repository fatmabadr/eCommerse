@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit sub->sub Category</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('sub->subCategory.updat')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type='hidden' name="id" value="{{$subsubcategory->id}}">
                 <div class="row">
                   <div class="col-12">


                                        <div class="form-group">
                                            <h5>Category Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="select" class="form-control"  >
                                                    <option value="" selected="" </option>
                                                    @foreach($allCategories as $category)

                                                    <option value="{{$category->id}}" {{$category->id ==$subsubcategory->category_id ? 'selected' : ''}}>{{$category->name_english}}</option>

                                                    @endforeach
                                                </select>

                                                </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subcategory_id" class="form-control"  >
                                                                <option value="" selected="" disabled="">Select SubCategory</option>
                                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}" {{$subcategory->id ==$subsubcategory->subcategory_id ? 'selected' : ''}}>{{$subcategory->name_english}}</option>
                                                    @endforeach
                                                            </select>

                                                         </div>
                                                             </div>



                    <div class="form-group">
                        <h5>sub->sub category name in English <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="name" name="name_english" class="form-control" value="{{$subsubcategory->name_english}}"> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>sub->sub category name in Arabic <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="name" name="name_arabic" class="form-control" value="{{$subsubcategory->name_arabic}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name_english+ '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
  </script>

   @endsection
