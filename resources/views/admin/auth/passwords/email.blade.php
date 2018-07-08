@extends('admin.layout.app')

@section('title') Admin Forgot Password @endsection

<!-- Main Content -->
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Admin Forgot Password</h3>
                    </div>
                    @if (session('status'))
                    <div class="card-header">
                        <div class="alert alert-success">
                            <h3>{{ session('status') }}</h3>
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="card-header bg-white mt-2">
                            <form class="was-validated" role="form" method="POST" action="{{ url('/admin/password/email') }}">
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

                                <div class="row ">
                                    <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 offset-md-4 offset-sm-5 col-sm-1 offset-4 col-2">
                                        <button type="submit" class="btn btn-success">Send Password Reset Link</button>
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
