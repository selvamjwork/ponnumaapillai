@extends('layouts.app')

@section('page_name') Delete Profile @endsection

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
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Search </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-">
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        <form class="form-horizontal" method="" action="{{ url('/deactiveUser') }}">
                            <input type="hidden" name="_token" value="">
                            <div class="jumbotron" style="text-align:center;">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <h5 class="alert-heading">Are you Sure to Delete Your Profile !</h5>
                                <hr>
                                <h5>நீங்கள் உங்கள் சுயவிவரத்தை நீக்குவது உறுதியாக இருக்கிறீர்களா</h5></div>
                                <input class="btn btn-danger" type="submit" value="OK">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection