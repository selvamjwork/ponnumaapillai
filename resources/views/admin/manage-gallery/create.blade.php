@extends('admin.layout.home')

@section('title') Photo Gallery @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Photo Gallery</h1>
                </div>
            </div>
        </div>
    </div>
    <form class="was-validated" method="POST" enctype="multipart/form-data" action="{{ url('/admin/manage-gallery') }}">
    {{ csrf_field() }}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Photo Gallery</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title">Title </label>
                                    <input type="text" name="title" class="form-control" id="title" required placeholder="Title">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('discreption') ? ' has-error' : '' }}">
                                    <label for="discreption">Discreption </label>
                                    <input type="text" name="discreption" class="form-control" id="discreption" required placeholder="Discreption">
                                    @if ($errors->has('discreption'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discreption') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 1 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 2 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 3 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 4 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 5 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="image">Image 6 </label>
                                    <input type="file" name="image[]" id="image" class="form-control" required multiple />
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                                        <button type="submit" class="btn btn-danger">Create Gallery</button>
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
