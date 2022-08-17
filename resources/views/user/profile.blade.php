@extends('user.master')
@section('content')




<div class ="body-content">

<div class ="container">
<div class= "col-md-2"><br>
    <img class ="card-img-top" style="border-radius:50% " src ="/frontend/users/profileImages/{{!empty(Auth::guard('web')->user()->photoDirectory)?Auth::guard('web')->user()->photoDirectory :'noimage.jpg'}}" height ="100%" width="100%"><br><br>
<ul class ="list-group list-group-flush">
    <a href="{{route('home')}}"class ="btn btn-primary btn-block">Home</a>
    <a href="{{route('user.update.profile')}}"class ="btn btn-primary btn-block">Profile Update</a>
    <a href="{{route('user.change.password')}}"class ="btn btn-primary btn-block">Change password</a>
    <a href="{{route('user.logout')}}"class ="btn btn-primary btn-block">Logout</a>
</ul>
</div>

</div>












@endsection
