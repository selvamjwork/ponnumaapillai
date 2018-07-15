@extends('admin.layout.home')

@section('title') Admin Sub Admin @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ponnu Maapillai</h1>
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col"><a href="{{ url('/admin/manage-subadmin/create') }}" class="btn btn-danger"><strong><em class="fa fa-user-plus mr-2"></em>Create Sub Admin </strong></a></div>
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                    @foreach($managesubadmin as $userdetails)
                                    <tr>
                                        <td>{{$userdetails->id}}</td>
                                        <td>{{$userdetails->name}}</td>
                                        <td>{{$userdetails->email}}</td>
                                        <td>{{$userdetails->mobile}}</td>
                                        <td>{{$userdetails->is_activated}}</td>
                                        <td><a href="{{ url('/admin/manage-subadmin/' . $userdetails->id) }}" class="btn btn-success btn-xs" title="View"><span><i class="fa fa-eye"></i></span></a>
                                            <a href="{{ url('/admin/manage-subadmin/' . $userdetails->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit "><span class="fa fa-pencil" aria-hidden="true"></span></a>
                                            {!! Form::open(['method'=>'DELETE','url' => ['/admin/manage-subadmin', $userdetails->id],
                                                'style' => 'display:inline'
                                              ]) !!}
                                              {!! Form::button('<span class="fa fa-times" aria-hidden="true" title="Deactivate" />', array(
                                                      'type' => 'submit',
                                                      'class' => 'btn btn-danger btn-xs',
                                                      'title' => 'Deactivate',
                                                      'onclick'=>'return confirm("Confirm Deactivate?")'
                                              )) !!}
                                              {!! Form::close() !!}
                                            <a href="{{ url('/admin/manage-subadmin/' . $userdetails->id . '/activate') }}" class="btn btn-info btn-xs" title="Activate"><span class="fa fa-check" aria-hidden="true"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer pagination clearfix page-item">
                                {!! $managesubadmin->render() !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
@endsection