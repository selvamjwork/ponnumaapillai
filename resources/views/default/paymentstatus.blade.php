@extends('layouts.app')
@section('page_name') Payment @endsection

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
                    <h1 class="m-0 text-dark">Make Payment</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row" align="center">
                <div class="col-md-12">
                    <div class="card card-widget">
                        <div class="widget-user-header bg-info-active">
                            <div class="widget-user mt-4 mb-3">
                                <img class="img-circle elevation-2" src="img/Logo-PonnuMaapillai.png" alt="User Avatar">
                                <br>
                                <h2 class="widget-user-username"><strong>Ponnu Maapillai</strong></h2>
                            </div>
                            <div class="card-footer">
                                <form class="form-horizontal" method="POST" action="makepayment.html">
                                    <input type="hidden" name="_token" value="">
                                    <div class="jumbotron" style="text-align:center;">

                                        <div class="alert alert-success" role="alert">Your subscription expire on <span class="badge bg-danger"><b>{{$expired_date}}</b></span>.
                                            <hr> உங்கள் சந்தா <span class="badge bg-danger"><b>{{$expired_date}}</b></span> அன்று காலாவதியாகும்.</div>

                                        <input class="btn btn-success" type="submit" value="Check Out">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection