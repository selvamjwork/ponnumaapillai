@extends('admin.layout.home')

@section('title') Admin Sub Caste @endsection

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
                            <h3 class="card-title">Sub Caste List</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ url('/admin/sub-caste') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('caste_id') ? ' has-error' : '' }}">
                                    <label for="caste_id">Caste Name</label>
                                    {!! Form::select('caste_id', $casteArray, null, ['class' => 'form-control','placeholder'=>'Select Caste']) !!}
                                    {!! $errors->first('caste_id', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group{{ $errors->has('subcaste_name') ? ' has-error' : '' }}">
                                    <label for="subcaste_name">Sub Caste </label>
                                    <input type="text" name="subcaste_name" class="form-control" id="subcaste_name" placeholder="Sub Caste">
                                    @if ($errors->has('subcaste_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subcaste_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Add Sub Caste</button>
                                </div>
                            </form>
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th style="width: 15px">#</th>
                                        <th>Caste</th>
                                        <th>Sub Caste</th>
                                        <th style="width: 40px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                    @foreach($subcaste as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->caste->caste_name}}</td>
                                            <td>{{$value->subcaste_name}}</td>
                                            <td>
                                                <a href="{{ url('/admin/sub-caste/' . $value->id . '/edit') }}"><span class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                            </td>
                                            <td>{!! Form::open(['method'=>'DELETE','url' => ['/admin/sub-caste', $value->id],'style' => 'display:inline']) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'return confirm("Confirm Delete?")')) !!}
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <div class="pagination float-right">
                                    {!! $subcaste->render("pagination::bootstrap-4") !!}
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