@extends('Admin.admin_master')
@section('mainContent')





<div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-black"  center center;">
      <h3 class="widget-user-username">Admin Name:{{$adminData->name}}</h3>
      <a href="{{route('admin.profile.edite')}}" style ="float:right;" class="btn btn-primary mb-5">Edit Profile</button></a>
      <h6 class="widget-user-desc">Email:{{$adminData->email}}</h6>
    </div>
    <div class="widget-user-image">
      <img class="rounded-circle" src="{{!empty($adminData->photoDirectory)?url('backend/admin/profileImages/'.$adminData->photoDirectory):url('backend/images/user3-128x128.jpg')}}"     alt="User Avatar">
    </div>
    <div class="box-footer">
      <div class="row">
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">12K</h5>
            <span class="description-text">FOLLOWERS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 br-1 bl-1">
          <div class="description-block">
            <h5 class="description-header">550</h5>
            <span class="description-text">FOLLOWERS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">158</h5>
            <span class="description-text">TWEETS</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>

@endsection
