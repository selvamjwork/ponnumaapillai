@extends('layouts.guest')
@section('page_name') Photo Gallery @endsection

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="panel-heading"><center><strong>Photo Gallery</strong></center></div>
        <div class="glass-panal-default">
            <div class="panel-body">
                <div class="row text-center text-lg-left">
                    @if(count($album->photos) > 0)
                        <?php 
                            $colcount = count($album->photos);
                            $i = 1;
                        ?>

                        @foreach($album->photos as $photos)
                            @if($i == $colcount)
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <a href="/images/uploads/photos/{{$album->id}}/{{$photos->photo}}" class="d-block mb-4 h-100">
                                        <img class="img-fluid img-thumbnail" src="/images/uploads/photos/{{$album->id}}/{{$photos->photo}}" alt="{{$photos->title}}">
                                        <h6 class="text-center">{{$photos->title}}</h6>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                    <a href="/images/uploads/photos/{{$album->id}}/{{$photos->photo}}" class="d-block mb-4 h-100">
                                        <img class="img-fluid img-thumbnail" src="/images/uploads/photos/{{$album->id}}/{{$photos->photo}}" alt="{{$photos->title}}">
                                        <h6 class="text-center">{{$photos->title}}</h6>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p>No Photos To Display</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection