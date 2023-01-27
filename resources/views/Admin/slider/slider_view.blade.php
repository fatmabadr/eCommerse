@extends('admin.master')
@section('content')

<script src="/assets/vendor_components/datatable/datatables.min.js"></script>
<script src="/backend/js/pages/data-table.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@if(Session::has('succ'))
<div class="alert alert-success" role="alert">
    {{Session::get('succ')}}

</div>
       @endif
  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
      </div>
		<!-- Main content -->

	<div class="row">
			<div class="col-8">




			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table With Full Features</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image </th>
 								<th>Title</th>
 								<th>Decription</th>
 								<th>Status</th>
 								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($sliders as $slider)


                            <tr>
                                <td><img src="/backend/admin/slider/{{$slider->slider_img}}"></td>
								<td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td>{{$slider->status}}</td>




                                <td>   <a  href="{{route('slider.edit',$slider->id)}}" class="btn btn-info" title ="Edite Data"><i class="fa fa-pencil"></i></a>
                                     <a  href="{{route('slider.delete',$slider->id)}}" class="btn btn-info" title ="Delete Data"><i class="fa fa-trash"></i></a>

                                </td>
							</tr>
                            @endforeach

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			  <!-- /.box -->


			  <!-- /.box -->
            </div>






                  <div class="col-4">
                   <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Add new Brand</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <form action="{{route('slider.save')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <h5>slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="title" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div></div>

                            <div class="form-group">
                                <h5>slider description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="description" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div></div>




                           <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"> image</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="slideImage" type="file"  id="image">
                            </div> </div>



                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id ="showImage"src=""" alt="avatar-5" class="rounded avatar-lg">

                        </div>   </div>




                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save slider">

                    </form>

                          </div>


		  <!-- /.row -->

		<!-- /.content -->

	  </div>

<!--add new brand-->





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
