@extends('admin.layout.home')

@section('title') Admin Sub Admin Create @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ponnu Maapillai - Create Sub Admin</h1>
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Sub Admin Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-header bg-white mt-2">
                                <form class="was-validated" method="POST" action="{{ url('/admin/manage-subadmin') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-xl-6 col-sm-9">
                                            {!! Form::text('name', null, ['placeholder'=>'Name','class' => 'form-control','required']) !!}
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form">Mobile Number</label>
                                        <div class="col-md-6 col-sm-9">
                                           {!! Form::text('mobile', null, ['placeholder'=>'Mobile Number','class' => 'form-control','required']) !!}
                                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form">Email Address</label>
                                        <div class="col-md-6 col-sm-9">
                                            {!! Form::email('email', null, ['placeholder'=>'Email Address','class' => 'form-control','required']) !!}
                                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password1" class="col-md-3 control-label">Password <i class="glyphicon glyphicon-asterisk text-danger"></i></label>
                                        <div class="col-md-6">
                                            {!! Form::text('password', null, ['placeholder'=>'*********','class' => 'form-control','required']) !!}
                                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
</div>
@endsection