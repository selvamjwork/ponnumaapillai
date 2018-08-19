@extends('admin.layout.home')

@section('title') Photo Albums @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Photo Albums</h1>
                </div>
            </div>
        </div>
    </div>
    <form class="was-validated" method="POST" enctype="multipart/form-data" action="{{ url('/admin/album') }}">
    {{ csrf_field() }}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Photo Albums</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Album Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required placeholder="Album Name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Discreption</label>
                                    <input type="text" name="description" class="form-control" id="description" required placeholder="Discreption">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('cover_image') ? ' has-error' : '' }}">
                                    <label for="cover_image">Image</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control" required multiple />
                                    @if ($errors->has('cover_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                                        <button type="submit" class="btn btn-danger">Create Album</button>
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
