@extends('layouts.payment')
@section('page_name') Payment @endsection
@section('content')
{{-- <form class="form-horizontal" method="POST" action="{{ url('/checkout') }}"> --}}
{{ csrf_field() }}
    <div class="jumbotron" style="text-align:center;">
        <img class="homepage-logo-img" src="{{URL::to('/')}}/image/logo.png" width="100" height="100">
        <h4 class="nomargin">Ponnu Maapillai</h4>
        <div class="alert alert-success" role="alert">Introductory Offer Annual Subscription Fee Rupees 600 - அறிமுக சலுகை ஒரு ஆண்டு சந்தா கட்டணம் ரூபாய் 600</div>
        <table style="margin:0px auto;">
            <tr>
                <td class="text-right"><h4>Amount : </h4></h3></td>
                <td class="text-left"><h4><strong>Rs 508</strong></h4></td>
            </tr>
            <tr>
                <td class="text-right"><h4>GST : </h4></td>
                <td class="text-left"><h4><strong> Rs 92 (18% of  508)</strong></h4></td>
            </tr>
            <tr>
                <td class="text-right"><h4>Total : </h4></td>
                <td class="text-left"><h4><strong> Rs 600</strong></h4></td>
            </tr>
        </table>  
        <a href="{{ url('/home') }}" class="btn btn-success">Check Out</a>
    </div>
       
    </div>
{{-- </form> --}}
@endsection