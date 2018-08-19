@extends('admin.layout.home')

@section('title') Album @endsection

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
                <div class="col"><a href="{{ url('/admin/album/create') }}" class="btn btn-danger"><b><i class="fa fa-user-plus mr-2"></i>Create New Album</b></a></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Album List</h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center text-lg-left">
                                @if(count($albums) > 0)
                                    <?php 
                                        $colcount = count($albums);
                                        $i = 1;
                                    ?>

                                    @foreach($albums as $album)
                                        @if($i == $colcount)
                                            <div class="col-lg-3 col-md-4 col-xs-6">
                                                <a href="/admin/album/{{$album->id}}" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="/images/uploads/albums/{{$album->cover_image}}" alt="{{$album->name}}">
                                                    <h6 class="text-center">{{$album->name}}</h6>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-lg-3 col-md-4 col-xs-6">
                                                <a href="/admin/album/{{$album->id}}" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="/images/uploads/albums/{{$album->cover_image}}" alt="{{$album->name}}">
                                                    <h6 class="text-center">{{$album->name}}</h6>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>No Albums To Display</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection