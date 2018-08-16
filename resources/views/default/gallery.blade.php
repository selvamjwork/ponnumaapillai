@extends('layouts.guest')
@section('page_name') Photo Gallery @endsection

@section('content')
    <div class="container gallery-container">
    <div class="panel-heading"><center><strong><h1>Gallery</h1></strong></center></div>
        <div class="tz-gallery">
            <div class="row">
                @foreach($gallery as $image)
                <div class="col-sm-12 col-md-4">
                    <a class="lightbox" href="/images/uploads/gallery/{!! $image->image !!}">
                        <img src="/images/uploads/gallery/{!! $image->image !!}" alt="Bridge">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {!! $gallery->appends(\Input::except('page'))->render() !!}  
            </div>
        </div>
    </div>
@endsection