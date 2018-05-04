@extends('layouts.app')

@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Profile</div>
            
              <table class="table">
              <td>
                <h5> Name : {{ $current_user->name }} </h5>
                <h5> Email : {{ $current_user->email }} </h5>
              </td>  
              </table>
            </div>
            <a class="btn light-blue darken-4 href" href='{{url("profile/$current_user->id/changepassword")}}' style="font-size: 10px">Change Password</a>

            <img src="/uploads/{{ $current_user->avatar }}" style="width:150px; height:150px; float: left; border-radius: 50%; margin right:25px">
            
            <h5> {{ $current_user->name }}'s Profile</h5>

            <form enctype="multipart/form-data" action="/profile" method="POST">
            <label>Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-small btn-primary">
            </form> 
        </div>
    </div>
</div>




@endsection

