@extends('layouts.guest')
@section('page_name') Reach Us @endsection

@section('content')
<div class="container">
	<div class="container-fluid">
		<div class="row">
			@foreach($cantact as $cantactus)
			<div class="col-md-6">
			  	<div class="card card-danger">
			     	<div class="card-header">
			        	<h3 class="card-title">{!! $cantactus->area !!}</h3>
			     	</div>
			     	<div class="card-body">
				        <ul class="list-group list-group-unbordered mb-3">
				        	<strong>Address</strong>
				           <li class="list-group-item">
				              	<p>{!! $cantactus->address !!}</p>
				           	</li>
				           	<strong>Mobile Number</strong>
				           	<li class="list-group-item">
				           		<a>{!! $cantactus->mobile !!}</a> 
				           	</li>
				           	<strong>E-Mail</strong>
				           	<li class="list-group-item"> <a>{!! $cantactus->email !!}</a> </li>
				        </ul>
			    	</div>
			  	</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endsection