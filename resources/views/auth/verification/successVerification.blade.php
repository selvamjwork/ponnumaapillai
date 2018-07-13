@extends('layouts.guest')

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email</div>

                <div class="panel-body">
                    SuccessFully Verified .<a href="/home">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection