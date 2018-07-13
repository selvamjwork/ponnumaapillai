@extends('admin.layout.home')

@section('content')
<div class="panel-heading">Payment Status</div>
<div class="glass-panal-default">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Payment Status</h5>
    </div>
<table class="table table-bordered data-table">
<tr>
<th>User ID</th>
<th>Order ID</th>
<th>Tracking ID</th>
<th>Bank Ref_no</th>
<th>Order Status</th>
<th>Failure Message</th>
<th>Payment Mode</th>
<th>Card Name</th>
<th>Status Message</th>
<th>Mer Amount</th>
<th>Trans Date</th>
<th>Invoice Download</th>
</tr>
@foreach($order_id as $key => $data)
    <tr>    
      <td class="gradeX">{{$data->user_id}}</td> 
      <td class="gradeX">{{$data->order_id}}</td> 
      <td class="gradeX">{{$data->tracking_id}}</td> 
      <td class="gradeX">{{$data->bank_ref_no}}</td> 
      <td class="gradeX">{{$data->order_status}}</td> 
      <td class="gradeX">{{$data->failure_message}}</td> 
      <td class="gradeX">{{$data->payment_mode}}</td> 
      <td class="gradeX">{{$data->card_name}}</td> 
      <td class="gradeX">{{$data->status_message}}</td> 
      <td class="gradeX">{{$data->currency}} {{$data->amount}}</td> 
      <td class="gradeX">{{$data->trans_date}}</td> 
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
@endforeach
</table>
</div>
        </div>
    </div>
</div>
</div>
@endsection