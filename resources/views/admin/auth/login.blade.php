@extends('admin.layout.app')

@section('title') Admin Login @endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-header bg-white mt-2">
                            <form class="was-validated" role="form" method="POST" action="{{ url('/admin/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-3 col-form-label">E-Mail Address</label>
                                    <div class="col-xl-9 col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-sm-3 col-form">Password</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input id="password" placeholder="**********" type="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-md-8 offset-sm-10 col-md-9 col-sm-12">
                                        <a class="btn btn-link" style="color:#dc3545;" href="{{ url('/admin/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="row ">
                                    <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                        <button type="submit" class="btn btn-success">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
