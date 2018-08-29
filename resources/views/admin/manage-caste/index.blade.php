@extends('admin.layout.home')

@section('title') Admin Caste @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
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
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Caste List</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ url('/admin/caste') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('caste_name') ? ' has-error' : '' }}">
                                    <label for="caste_name">Add New Caste </label>
                                    <input type="text" name="caste_name" class="form-control" id="caste_name" placeholder="Add New Caste">
                                    @if ($errors->has('caste_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('caste_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Add Caste</button>
                                </div>
                            </form>
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th style="width: 15px">#</th>
                                        <th>Edit Caste</th>
                                        <th style="width: 40px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                    @foreach($caste as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->caste_name}}</td>
                                            <td>
                                                <a href="{{ url('/admin/caste/' . $value->id . '/edit') }}"><span class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                            </td>
                                            <td>{!! Form::open(['method'=>'DELETE','url' => ['/admin/caste', $value->id],'style' => 'display:inline']) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'return confirm("Confirm Delete?")')) !!}
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                <div class="pagination pagination-sm m-0 float-right">
                                    {!! $caste->render("pagination::bootstrap-4") !!} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection