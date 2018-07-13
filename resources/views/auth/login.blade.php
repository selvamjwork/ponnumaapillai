@extends('layouts.guestlogin')

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif

<div class="container">    
    <marquee behavior=scroll direction="left" style="color:red;font-size: 20px;" scrollamount="3">Introductory Offer Annual Subscription Fee Rupees 600 - அறிமுக சலுகை ஒரு ஆண்டு சந்தா கட்டணம் ரூபாய் 600</marquee>
    <div class="col-md-8">
        <div class="col-md-12">
            <div class="banner">
                <div class="container">
                    <div class="banner_info">
                        <!-- <h3>Millions of verified Members</h3> -->
                        <div class="blink"><span><strong style="color: black">New User</strong></span></div>
                        <a href="{{ route('register') }}" class="hvr-shutter-out-horizontal reg-pull-right">Create Your Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <div class="god">
                    </div>
                    <center><p style="color: #fff;font-weight: 700; font-size:15px;margin-top: -375px;">MEENAKSHI THIRUKALYANAM</p></center>
            </form>
        </div>
    </div>
</div>
@endsection
