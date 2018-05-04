@extends('layouts.app')

@section('main_content')

@section('main_content')
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@elseif (session('alert2'))
    <div class="alert alert-danger">
        {{ session('alert2') }}
    </div>
@endif

</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change password</div>
 
                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form class="form-horizontal" method="POST" action='{{url("profile/$current_user->id/updatePassword")}}'>
                        
 
                        <div class="form-group{{ $errors->has('currentpassword') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>
 
                            <div class="col-md-6">
                                <input id="currentpassword" type="password" class="form-control" name="currentpassword" required>
 
                                @if ($errors->has('currentpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('currentpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                            <label for="newpassword" class="col-md-4 control-label">New Password</label>
 
                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control" name="newpassword" required>
 
                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <!-- <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
 
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="confirmpassword" required>
                            </div>
                        </div> -->
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
@endsection