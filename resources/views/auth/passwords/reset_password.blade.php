@extends('layouts.guest')

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <form class="form-horizontal" name="resetcode" role="form" method="get" action="{{ url('/reset-password') }}" >
            {{ csrf_field() }}

            <input type="hidden" name="mobile">
            <div class="form-group row{{ $errors->has('mobile_reset_code') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">Mobile Code</label>

                <div class="col-md-6">
                    <input id="mobile_reset_code" placeholder="Enter Verification Code" type="mobile" class="form-control" name="mobile_reset_code" value="{{ old('mobile_reset_code') }}" required>

                    
                        <span class="help-block hidden">
                            <strong></strong>
                        </span>
                    
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" placeholder="***********" class="form-control" name="password" required>

                    
                        <span class="help-block hidden">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                 
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" placeholder="***********" class="form-control" name="password_confirmation" required>

                   
                        <span class="help-block hidden">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    
                </div>
            </div>

            <div class="row">
                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                    <button type="submit" class="btn btn-success">Reset Password</button>
                </div>
            </div>
        </form> 
    </div>
</div>
@endsection