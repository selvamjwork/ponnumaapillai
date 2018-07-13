@extends('layouts.app')
@section('page_name') Payment Receipt @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Payment Status</h1>
                </div>
            </div>
            @if (session('status'))
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="alert alert-success">
                        <h1 class="m-0 text-dark">{{ session('status') }}</h1>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($order_id as $key => $data )
                <table border = "1" class="table table-bordered table-striped">
                    <tr>
                        <td>Order Id</td>

                        <td>Tracking Id</td>

                        <td>Bank Ref No</td>

                        <td>Failure Message</td>

                        <td>Trans Date</td>

                        <td>Order Status</td>
                    </tr>
                    <tr>
                        <td>{{$data->order_id}}</td> 

                        <td>{{$data->tracking_id}}</td> 

                        <td>{{$data->bank_ref_no}}</td> 

                        <td>{{$data->failure_message}}</td>

                        <td>{{$data->trans_date}}</td> 
                        <td>
                            @if ($data->order_status === "Success")
                        		<p class="green">Success<br>
                        		<a href="{{ route('pdfview',['download'=>'pdf','invoiceid' => $data->id,'user_id' => $data->user_id]) }}">Download Receipt</a></p>
                            @elseif ($data->order_status === "Aborted")
                        		<p class="red">{{$data->order_status}}</p>
                            @else
                        	    <p class="red">{{$data->order_status}}</p>
                            @endif
                        </td>
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection