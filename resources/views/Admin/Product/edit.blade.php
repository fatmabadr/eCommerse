@extends('Admin.master')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="col-12">
    <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Add new Product</h3>
       </div>


       @if(Session::has('succ'))
       <div class="alert alert-success" role="alert">
           {{Session::get('succ')}}

       </div>
              @endif

       <div class="box-body">
         <form action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type='hidden' name="id" value="{{$product->id}}">
             <div class="box-body pb-0">
                <div class="row">
                  <div class="col-md-3 col-12">
                    <div class="form-group">
                      <label>Brand Select</label>



                      <select class="form-control select2" name="brand_id" style="width: 100%;">
                        <option selected="selected"value="{{$product->brand_id}}">{{$product['brand']['name_english']}}</option>
                        @foreach($allBrands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name_english}}</option>
                        @endforeach
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="form-group">
                      <label>Category select</label>
                      <select name="category_id" class="form-control"  >
                        <option value="{{$product->category_id}}" selected="" >{{$product['category']['name_english']}}</option>
                        @foreach($allCategories as $category)
                        <option value="{{$category->id}}">{{ $category->name_english }}</option>
                        @endforeach
                    </select>
                    </div>





                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-3 col-12">
                    <div class="form-group">
                      <label>Subcategory select</label>
                      <select name="subcategory_id" class="form-control"  >
                        <option value="{{$product->subcategory_id}}" selected="" >{{$product['subcategory']['name_english']}}</option>

                    </select>
                    </div>
                    <!-- /.form-group -->
                  </div>

                  <div class="col-md-3 col-12">
                    <div class="form-group">
                      <label>sub->Subcategory select</label>
                      <select name="subsubcategory_id" class="form-control"  >
                        <option value="{{$product->subsubcategory_id}}" selected="" >{{$product['subsubcategory']['name_english']}}</option>

                    </select>
                    </div>
                    <!-- /.form-group -->
                  </div>



                </div>
                <!-- /.row -->
              </div>

              <div class="row">
              <div class="col-md-3 col-12">
             <div class="form-group">
                 <h5>product name in English <span class="text-danger">*</span></h5>
                 <div class="controls">
                     <input type="text" name="product_name_english" class="form-control" value="{{$product->name_english}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
             </div></div>
              </div>
               <div class="col-md-3 col-12">
             <div class="form-group">
                <h5>اسم المنتج  <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="product_name_arabic" class="form-control" value="{{$product->name_arabic}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
            </div></div></div>
            <div class="col-md-3 col-12">
            <div class="form-group">
                <h5>product code  <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="product_code" class="form-control" value="{{$product->code}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
            </div></div></div>



                <div class="col-md-3 col-12">
            <div class="form-group">
                <h5>product quantity   <span class="text-danger">*</span></h5>
              </div>

              <div class="controls">
                <input type="text" name="product_quantity" class="form-control" value="{{$product->quantity}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
        </div></div>








    <div class="row">


    <div class="col-md-4">
    <div class="form-group">
   <h5>Product Tags En <span class="text-danger">*</span></h5>
   <div class="controls">
<input type="text" name="product_tags_en" class="form-control" value="{{$product->tags_english}}" data-role="tagsinput">
     </div></div> </div>




    <div class="col-md-4">
        <div class="form-group">
       <h5>Product Tags Arabic <span class="text-danger">*</span></h5>
       <div class="controls">
    <input type="text" name="product_tags_arabic" class="form-control" value="{{$product->tags_arabic}}" data-role="tagsinput">
         </div></div> </div>

         <div class="col-md-4">
            <div class="form-group">
           <h5>Product Size En <span class="text-danger">*</span></h5>
           <div class="controls">
        <input type="text" name="product_size_en" class="form-control" value="{{$product->size_english}}" data-role="tagsinput">
             </div></div> </div>

    </div>











<div class="row">


    <div class="col-md-4">
    <div class="form-group">
   <h5>Product Size Arabic <span class="text-danger">*</span></h5>
   <div class="controls">
<input type="text" name="product_size_arabic" class="form-control" value="{{$product->size_arabic}}" data-role="tagsinput">
     </div></div> </div>




    <div class="col-md-4">
        <div class="form-group">
       <h5>Product color Arabic <span class="text-danger">*</span></h5>
       <div class="controls">
    <input type="text" name="product_color_arabic" class="form-control" value="{{$product->color_arabic}}" data-role="tagsinput">
         </div></div> </div>

         <div class="col-md-4">
            <div class="form-group">
           <h5>Product color En <span class="text-danger">*</span></h5>
           <div class="controls">
        <input type="text" name="product_color_en" class="form-control" value="{{$product->color_english}}" data-role="tagsinput">
             </div></div> </div>

    </div>



    <div class="row">
        <div class="col-md-3 col-12">
       <div class="form-group">
           <h5>silling price <span class="text-danger">*</span></h5>
           <div class="controls">
               <input type="text" name="silling_price" class="form-control" value="{{$product->selling_price}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
       </div></div>
        </div>
         <div class="col-md-3 col-12">
       <div class="form-group">
          <h5>Discount Price <span class="text-danger">*</span></h5>
          <div class="controls">
              <input type="text" name="descount_price" class="form-control" value="{{$product->discount_price}}"required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
      </div></div></div>
      <div class="col-md-3">

	    <div class="form-group">
			<h5>Main Thambnail <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="product_thambnail" class="form-control" onchange="mainthamsURL(this)">
<img src="" id="mainThaumbles">
	 		 </div>
		</div>
	</div>
        <div class="col-md-3">

            <div class="form-group">
                <h5>Multiple Image <span class="text-danger">*</span></h5>
                <div class="controls">
         <input type="file" name="multi_img[]" multiple="" id="multiImg" class="form-control" >
         <div class="row" id="preview_img"></div>
                  </div>
            </div>
                </div>
    </div>

              </div>

    <div class="row"> <!-- start 7th row  -->
        <div class="col-md-6 col-12">

    <div class="form-group">
        <h5>Short Description English <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea name="short_descp_en" id="textarea" class="form-control" value=""required >{{$product->short_description_english}}</textarea>
          </div>
    </div>

        </div> <!-- end col md 6 -->

        <div class="col-md-6 col-12">

     <div class="form-group">
        <h5>Short Description Arabic <span class="text-danger">*</span></h5>
        <div class="controls">
<textarea name="short_descp_arabic" id="textarea" class="form-control"value="" required placeholder="">{{$product->short_description_arabic}}</textarea>
          </div>
    </div></div></div>






    <div class="row">
    <div class="col-md-6">

<div class="form-group">
    <h5>Long Description English <span class="text-danger">*</span></h5>
    <div class="controls">
<textarea id="editor1" name="long_descp_english"value="{{$product->long_description_english}}" rows="10" cols="80">
    {{$product->long_description_english}}
                </textarea>
      </div>
</div></div>


<div class="col-md-6">

    <div class="form-group">
        <h5>Long Description arabic <span class="text-danger">*</span></h5>
        <div class="controls">
    <textarea id="editor2" name="long_descp_arabic"value="{{$product->long_description_arabic}}" rows="10" cols="80">
        {{$product->long_description_arabic}}
                    </textarea>
          </div>
    </div>

</div>




<div class="col-md-3">
	<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="hot_deal" value="{{$product->hotDeals}}">
				<label for="checkbox_3">Hot Deal</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="special_deals" value="{{$product->specialdeals}}">
				<label for="checkbox_4">Special Deals</label>
			</fieldset>

            <fieldset>
				<input type="checkbox" id="checkbox_5" name="featured" value="{{$product->featured}}">
				<label for="checkbox_5">Featured</label>
			</fieldset>

            <fieldset>
				<input type="checkbox" id="checkbox_6" name="special_offer" value="{{$product->specialoffer}}">
				<label for="checkbox_6">Special offer</label>
			</fieldset>

        </div></div></div>

         <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save product">

     </form>

           </div>


<!-- /.row -->

<!-- /.content -->

</div>



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
                     $('select[name="subcategory_id"]').empty().html();
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name_english+ '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });


      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/category/subcategory/subsubcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.name_english+ '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
  </script>

<script type="text/javascript">
function mainthamsURL(input){
  if (input.files &&input.files[0]){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#mainThaumbles').attr('src',e.target.result).width(80).height(80);};
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>





<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>
@endsection
