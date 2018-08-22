@extends('admin.layout.home')

@section('title') Contact Us @endsection

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
                <div class="col"><a href="{{ url('/admin/contectus/create') }}" class="btn btn-danger"><strong><em class="fa fa-user-plus mr-2"></em>Create Contact Us </strong></a></div>
            </div>
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-plus mr-1"></i>New Contact Us</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Area</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Actions</th>

                                    </tr>
                                    @foreach($contect as $contectus)
                                    <tr>
                                        <td>{{$contectus->id}}</td>
                                        <td>{{$contectus->area}}</td>
                                        <td>{{$contectus->email}}</td>
                                        <td>{{$contectus->mobile}}</td>
                                        <td>{{$contectus->address}}</td>
                                        <td><a href="{{ url('/admin/contectus/' . $contectus->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit "><span class="fa fa-pencil" aria-hidden="true"></span></a>
                                            {!! Form::open(['method'=>'DELETE','url' => ['/admin/contectus', $contectus->id],
                                                'style' => 'display:inline'
                                              ]) !!}
                                              {!! Form::button('<span class="fa fa-times" aria-hidden="true" title="Delete" />', array(
                                                      'type' => 'submit',
                                                      'class' => 'btn btn-danger btn-xs',
                                                      'title' => 'Delete',
                                                      'onclick'=>'return confirm("Confirm Delete?")'
                                              )) !!}
                                              {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer pagination clearfix page-item">
                                {!! $contect->render() !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
@endsection