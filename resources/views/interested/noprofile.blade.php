@extends('layouts.app')
@section('page_name') No Profile @endsection

@section('content')

@section('title')<b>No Profile</b>@endsection
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
                    <!-- <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai</h1> -->
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card  card-danger card-outline card-widget widget-user ">
                <div class="widget-user-header bg-info-active text-center">
                    <h3 class="widget-user-username text-danger"><b>No Profile Match</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection