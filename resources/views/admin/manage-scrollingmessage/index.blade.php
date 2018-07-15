@extends('admin.layout.home')

@section('title') Admin Scrolling Message @endsection

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
                            <h3 class="card-title">Scrolling Message List</h3>
                        </div>
                        <div class="card-body">
                            <!-- <form role="form" method="POST" action="{{ url('/admin/scrollingmessage') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('scrolling_message') ? ' has-error' : '' }}">
                                    <label for="scrolling_message">Add New Message </label>
                                    <input type="text" name="scrolling_message" class="form-control" id="scrolling_message" placeholder="Add New Message">
                                    @if ($errors->has('scrolling_message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('scrolling_message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Add Scrolling Message</button>
                                </div>
                            </form> -->
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <!-- <th style="width: 15px">#</th> -->
                                        <th>Edit Scrolling Message</th>
                                        <th style="width: 40px">Edit</th>
                                        <!-- <th style="width: 40px">Delete</th> -->
                                    </tr>
                                    @foreach($scrollingmessage as $value)
                                        <tr>
                                            <!-- <td>{{$value->id}}</td> -->
                                            <td>{{$value->scrolling_message}}</td>
                                            <td>
                                                <a href="{{ url('/admin/scrollingmessage/' . $value->id . '/edit') }}"><span class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                            </td>
                                            <!-- <td>{!! Form::open(['method'=>'DELETE','url' => ['/admin/scrollingmessage', $value->id],'style' => 'display:inline']) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'return confirm("Confirm Delete?")')) !!}
                                            {!! Form::close() !!}
                                            </td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $scrollingmessage->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection