@extends('layouts.app')
@section('page_name') View Profile @endsection
@section('content')

<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="d-print-none m-0 text-dark">Welcome to Ponnu Maapillai</h1>
              </div>
          </div>
          <div class="row mt-1">
              <div class="col"><a href="#" onclick="goBack()" class="btn btn-danger"><b>Back</b></a></div>
          </div>
          <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    @if(Session::has('message')) 
                        <div class="alert alert-info"> {{Session::get('message')}} </div> 
                    @endif
                </div>
          </div>
      </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{$user->user_id}} - {{$user->name}}</b></h3>
                        </div>
                        <div class="card-body">
                            <center>
                                <img height="500" width="400" class="center-block" src="/images/uploads/profile_pic/{{$user->profile_pic}}" />
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <a class="btn btn-danger float-sm-right mb-3 d-print-none" href="javascript:window.print()">Print Photo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
  <script>
      function goBack() {
          window.history.back();
      }
  </script>
@endsection