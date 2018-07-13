@extends('subadmin.layout.home')

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
    </tr>
@endforeach
</table>
</div>
        </div>
    </div>
</div>
</div>
@endsection