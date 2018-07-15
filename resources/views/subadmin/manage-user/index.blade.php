@extends('subadmin.layout.home')

@section('title') Manage User @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Manage Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Manage Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col"><a href="{{ url('/subadmin/manage-user/create') }}" class="btn btn-danger"><b><i class="fa fa-user-plus mr-2"></i>Create New User</b></a></div>
            </div>
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-plus mr-1"></i>New Registration</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Matri ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($user as $key => $userdetails)
                                      <tr>
                                          <td>{{$userdetails->user_id}}</td>
                                          <td>{{$userdetails->name}}</td>
                                          <td>@if($userdetails->gender == 1) Male @else Female @endif</td>
                                          <td>{{$userdetails->mobile}}</td>
                                          <td>@if($userdetails->active == 1) Active @else inActive @endif</td>
                                          <td>@if($userdetails->payment_completed) Completed @else inCompleted @endif</td>
                                          <td><a href="{{ url('/subadmin/manage-user/' . $userdetails->id) }}" class="btn btn-success btn-xs" title="View"><span><i class="fa fa-eye"></i></span></a>
                                              <a href="{{ url('/subadmin/manage-user/' . $userdetails->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit "><span class="fa fa-pencil" aria-hidden="true"></span></a>
                                          </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <div class="pagination pagination-sm m-0 float-right"> {!! $user->render() !!} </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>

@endsection