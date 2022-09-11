@extends('Admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">change admin password</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('admin.save.newPassword')}}" method="POST" ">
                   @csrf
                 <div class="row">
                   <div class="col-12">
                    <div class="form-group">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                        {{Session::get('error')}}                      </div>
                                  @endif


                        <h5>old password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="old_password" class="form-control" value=""> <div class="help-block"></div></div>
                    </div>
                       <div class="form-group">
                           <h5>new password <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="password" name="new_password" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>
                       <div class="form-group">
                        <h5>confirm new password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="confirm_new_password" class="form-control" value=""required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>







@if(Session::has('succ'))
<div class="alert alert-danger" role="alert">
    {{Session::get('succ')}}
    @endif
</div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">change password</button>               </form>

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
