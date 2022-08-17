@extends('user.master')
@section('content')



<div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Edit Admin Data</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col">
            <form action="{{route('user.change.password')}}" method="POST" >
                @csrf
              <div class="row">
                <div class="col-12">
                 <div class="form-group">
                     <h5>Old password <span class="text-danger">*</span></h5>
                     <div class="controls">
                         <input type="password" name="oldPassword" class="form-control" value=""required autofocus> <div class="help-block"></div></div>
                 </div>

                 <div class="form-group">
                    <h5>new password <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="password" name="new_password" class="form-control" value=""required autofocus> <div class="help-block"></div></div>
                </div>
                <div class="form-group">
                    <h5>confirm New password <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="password" name="confirm_new_password" class="form-control" value="" required autofocus> <div class="help-block"></div></div>
                </div>





                     <button type="submit" class="btn btn-primary mb-5">Change Password</button>               </form>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>


@endsection
<br>
