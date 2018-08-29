@extends('admin.layout.home')

@section('title') Upload Photos @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Upload Photos</h1>
                </div>
            </div>
        </div>
    </div>
    <form class="was-validated" method="POST" enctype="multipart/form-data" action="{{ url('/admin/photo/create') }}">
    {{ csrf_field() }}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Upload Photos</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <input type="hidden" name="album_id" value="{{$album_id}}" class="form-control" id="album_id" required>
                                <div class="d-none form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="d-none form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="photo">Image</label>
                                    <input type="file" name="photo" id="photo" class="form-control" required multiple />
                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                                        <button type="submit" class="btn btn-danger">Upload Photos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
</div>

@endsection
