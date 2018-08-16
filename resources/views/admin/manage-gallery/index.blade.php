@extends('admin.layout.home')

@section('title') Gallery @endsection

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
                    
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col"><a href="{{ url('/admin/manage-gallery/create') }}" class="btn btn-danger"><b><i class="fa fa-user-plus mr-2"></i>Create New Gallery</b></a></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Gallery List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th style="width: 15px">#</th>
                                        <th>Image</th>
                                        <th>Created Date</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                    @foreach($images as $value)
                                        <tr>
                                            <td>{!! $value->id !!}</td>
                                            <td><img height="100" src="/images/uploads/gallery/{!! $value->image !!}" alt="..." class="margin"></td>

                                            <td>{{$value->created_at->day}}-{{$value->created_at->month}}-{{$value->created_at->year}}</td>
                                            
                                            <td>{!! Form::open(['method'=>'DELETE','url' => ['/admin/manage-gallery', $value->id],'style' => 'display:inline']) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'return confirm("Confirm Delete?")')) !!}
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection