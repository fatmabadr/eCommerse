@extends('Admin.master')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    @if(Session::has('succ'))
    <div class="alert alert-success" role="alert">
        {{Session::get('succ')}}

    </div>
           @endif

    <!-- Main content -->
    <section class="content">
      <div class="row">




        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table   class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image </th>
                            <th>Product Name En</th>
                            <th>Product Name Arabic </th>
                            <th>Quantity </th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
 @foreach($products as $item)
 <tr>
    <td> <img src="/backend/admin/productimages/{{!empty($item->product_thambnail)?$item->product_thambnail :'no_image.png'}}" style="width: 60px; height: 50px;">  </td>
    <td>{{ $item->name_english }}</td>
     <td>{{ $item->name_arabic }}</td>
     <td>{{ $item->quantity }}</td>
    <td>

<a href=" " class="btn btn-arrow-up" title="Edit Data"><i class="fa fa-arrow-up"></i> </a>
<a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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





      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>




@endsection
