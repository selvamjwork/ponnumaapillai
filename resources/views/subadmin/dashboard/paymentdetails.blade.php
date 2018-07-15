@extends('subadmin.layout.home')

@section('title') Payment Receipt @endsection
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
                <table class="table table-responsive text-center table-bordered mt-3">
                    <tbody>
                        <tr>
                            <th>user_id</th>
                            <th>order_id</th>
                            <th>tracking_id</th>
                            <th>bank_ref_no</th>
                            <th>order_status</th>
                            <th>failure_message</th>
                            <th>payment_mode</th>
                            <th>card_name</th>
                            <th>status_message</th>
                            <th>mer_amount</th>
                            <th>trans_date</th>
                        </tr>
                        @foreach($order_id as $key => $data)
                        <tr>    
                          <td>{{$data->user_id}}</td> 
                          <td>{{$data->order_id}}</td> 
                          <td>{{$data->tracking_id}}</td> 
                          <td>{{$data->bank_ref_no}}</td> 
                          <td>{{$data->order_status}}</td> 
                          <td>{{$data->failure_message}}</td> 
                          <td>{{$data->payment_mode}}</td> 
                          <td>{{$data->card_name}}</td> 
                          <td>{{$data->status_message}}</td> 
                          <td>{{$data->currency}} {{$data->amount}}</td> 
                          <td>{{$data->trans_date}}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection