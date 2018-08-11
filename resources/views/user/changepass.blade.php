@extends('layouts.app')
@section('page_name') Change Password @endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success')}} </div>
        @endif
        @if(Session::has('message')) 
                <div class="alert alert-info"> {{Session::get('message')}} </div> 
        @endif
        @if(Session::has('error'))
                <div class="alert alert-danger"> {{Session::get('error')}} </div> 
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Change Password</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12 ">
                    <div class="card card-widget widget-user">
                        <form role="form" method="POST" action="{{url('/profile/change-password')}}" class="was-validated mt-5 mb-5 ">
                            {{ csrf_field() }}
                            <div class="form-group row pl-5 pr-5">
                                <label for="password" class="col-md-5 control-label"><a class="float-lg-right">Current Password</a> <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                                <div class="col-md-3">
                                    <input id="password" placeholder="************" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row pl-5 pr-5">
                                <label for="new_password" class="col-md-5 control-label"><a class="float-lg-right">New Password</a></label>

                                <div class="col-md-3 ">
                                    <input id="new_password" placeholder="************" type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                            <div class="form-group row pl-5 pr-5">
                                <label for="password-confirm" class="col-md-5 control-label"><a class="float-lg-right">Confirm New Password</a></label>

                                <div class="col-md-3">
                                    <input id="password-confirm" placeholder="************" type="password" class="form-control" name="new_password_confirmation" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                    <button type="submit" class="btn btn-danger">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection