@extends('layouts.app')

@section('page_name') Search List @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h4 class="m-0 text-success">Matching Profile for Your Star - உங்கள் நட்சத்திரத்திற்கு பொருந்தும் சுயவிவரங்கள்</h4>
                    @if(Session::has('message')) 
                        <div class="alert alert-info"> {{Session::get('message')}} </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            @foreach($user as $us)
            <div class="card  card-danger card-outline card-widget widget-user ">
                <div class="widget-user-header bg-info-active">
                    <h3 class="widget-user-username"><b>@if($us->gender == 1)
                        Mr
                        @else
                        Ms
                        @endif.{!! $us->name !!}</b></h3>
                    <h5 class="widget-user-desc">Matri Id: <b>{!! $us->user_id !!}</b></h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="/images/uploads/profile_pic/{{$us->profile_pic}}" alt="{{$us->name}}" alt="Profile ID">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5>Age: <b>{{$us->age}}</b></h5>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block" align="center">
                                <h5>Height:<b>{{$us->height}} CM</b></h5>
                                <h5>Weight:<b>{{$us->weight}}kg</b></h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5>Religion:<b>{{$us->religion}}</b></h5>
                                <h5>Education:<b>{{$us->qualification}}</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="float-sm-left da text-danger" href="#"></a>
                        </div>
                        <div class="col-md-6">
                            <a class="float-sm-right da text-danger" href="{{ url('/profile/search/' . $us->id) }}">View Profile <em class="fa fa fa-forward" aria-hidden="true"></em></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers float-sm-right" id="example2_paginate">
                        <div class="pagination">
                            {!! $user->appends(\Input::except('page'))->render() !!}  
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection