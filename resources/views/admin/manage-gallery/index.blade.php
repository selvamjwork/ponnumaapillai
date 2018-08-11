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
                            <form role="form" method="POST" action="{{ url('/admin/manage-gallery') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title </label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Title </label>
                                    <input type="file" name="image" class="form-control" id="image" placeholder="Title">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">Add Image</button>
                                </div>
                            </form>
                            <table class="table table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th style="width: 15px">#</th>
                                        <th>Edit Image</th>
                                        <th style="width: 40px">Delete</th>
                                    </tr>
                                    @foreach($images as $value)
                                        <tr>
                                            <td>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                    <div class="timeline-body">
                                                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    </div>
                                                  </div>
                                            </td>
                                            
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