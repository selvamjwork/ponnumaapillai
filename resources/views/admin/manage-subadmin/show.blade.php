@extends('admin.layout.home')

@section('title') Admin Sub Admin @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - My Profile</h1>
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
                            <h3 class="card-title">Sub Admin-info</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                                <div class="row">
                                    <div class="col-md-6 pb-1">
                                        <li class="list-group-item"> <strong>ID</strong> <a class="float-right">{{ $managesubadmin->id }}</a> </li>
                                    </div>
                                    <div class="col-md-6 pb-1">
                                        <li class="list-group-item"> <strong>Name</strong> <a class="float-right">{{ $managesubadmin->name }}</a> </li>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pb-1">
                                        <li class="list-group-item"> <strong>Email</strong> <a class="float-right">{{ $managesubadmin->email }}</a> </li>
                                    </div>
                                    <div class="col-md-6 pb-1">
                                        <li class="list-group-item"> <strong>Mobile</strong> <a class="float-right">{{ $managesubadmin->mobile }}</a> </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection