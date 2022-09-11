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
								<th>Name eg  </th>
								<th>Name ar</th>
								<th>Slag eg</th>
								<th>slag ar</th>
								<th>icon</th>
                                <th>Action</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)


                            <tr>
								<td>{{$category->name_english}}</td>
								<td>{{$category->name_arabic}}</td>
								<td>{{$category->slag_english}}</td>
								<td>{{$category->slag_arabic}}</td>
								<td><i class="fa-brands fa-google"></i></td>


                                <td width ="30%">   <a  href="{{route('Category.edite',$category->id)}}" class="btn btn-info" title ="Edite Data"><i class="fa fa-pencil"></i></a>
                                     <a  href="{{route('Category.delete',$category->id)}}" class="btn btn-info" title ="Delete Data"><i class="fa fa-trash"></i></a>

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
                        <h3 class="box-title">Add new Category</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <form action="{{route('Category.save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Category name in English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name_english" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div></div>



                           <div class="form-group">
                               <h5>Category name in Arabic <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="name_arabic" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                           </div></div>



                           <div class="form-group">
                            <h5>Category icon  <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="icon" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                        </div></div>







                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save Category">

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
