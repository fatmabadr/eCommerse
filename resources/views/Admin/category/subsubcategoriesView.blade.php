@extends('Admin.master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
@if(Session::has('succ'))
<div class="alert alert-success" role="alert">
    {{Session::get('succ')}}

</div>
       @endif
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Sub->SubCategory List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category Name </th>
                              <th>SubCategory Name</th>
                              <th >Sub-Subcategory English Name </th>
                              <th>Sub-Subcategory Arabic Name </th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
   @foreach($allsubsubCategory as $item)
   <tr>
      <td> {{ $item['catgory']['name_english'] }} </td>
      <td>{{ $item['subcategory']['name_english'] }}</td>
      <td>{{ $item->name_english }}</td>
       <td>{{ $item->name_arabic}}</td>
      <td width="30%">
<a href="{{route('sub->subCategory.edite',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

<a href="{{route('sub->subCategory.delete',$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
   <i class="fa fa-trash"></i></a>
      </td>

   </tr>
    @endforeach
                      </tbody>

                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->


          </div>
          <!-- /.col -->


<!--   ------------ Add Category Page -------- -->


        <div class="col-4">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Add Sub-SubCategory </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">


<form method="post" action="{{ route('sub->subCategory.save') }}" >
       @csrf


   <div class="form-group">
  <h5>Category Select <span class="text-danger">*</span></h5>
  <div class="controls">
      <select name="category_id" class="form-control"  >
          <option value="" selected="" disabled="">Select Category</option>
          @foreach($allCategories as $category)
          <option value="{{ $category->id }}">{{ $category->name_english }}</option>
          @endforeach
      </select>
      @error('category_id')
   <span class="text-danger">{{ $message }}</span>
     @enderror
   </div>
       </div>


        <div class="form-group">
  <h5>SubCategory Select <span class="text-danger">*</span></h5>
  <div class="controls">
      <select name="subcategory_id" class="form-control"  >
          <option value="" selected="" disabled="">Select SubCategory</option>

      </select>
      @error('subcategory_id')
   <span class="text-danger">{{ $message }}</span>
   @enderror
   </div>
       </div>


  <div class="form-group">
      <h5>Sub-SubCategory English <span class="text-danger">*</span></h5>
      <div class="controls">
   <input type="text" name="subsubcategory_name_en" class="form-control" >
   @error('subsubcategory_name_en')
   <span class="text-danger">{{ $message }}</span>
   @enderror
    </div>
  </div>


  <div class="form-group">
      <h5>Sub-SubCategory Arabic  <span class="text-danger">*</span></h5>
      <div class="controls">
   <input type="text" name="subsubcategory_name_arabic" class="form-control" >
   @error('subsubcategory_name_arabic')
   <span class="text-danger">{{ $message }}</span>
   @enderror
    </div>
  </div>


           <div class="text-xs-right">
  <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                      </div>
                  </form>





                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>




        </div>
        <!-- /.row -->
      </section>
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
