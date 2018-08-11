@extends('layouts.app')
@section('page_name') Home @endsection
@section('content')
@section('title')<b>My id</b>@endsection
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
						<h1 class="m-0 text-dark">Welcome to Ponnu Maapillai </h1>
					</div>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="container-fluid">

				<div class="row" align="center">

					<div class="col-md-12">
						<div class="card card-widget widget-user">
							<div class="widget-user-header bg-info-active">
								<h3 class="widget-user-username"><strong>{{$id->name}}</strong></h3>
							</div>
							<div class="widget-user-image">
								<img class="img-circle elevation-2" src="/images/uploads/profile_pic/{{$id->profile_pic}}" alt="User Avatar">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-sm-4 border-right">
										<div class="description-block">
											<h5 class="description-header">MatriID</h5>
											<span class="description-text">{{$id->user_id}}</span>
										</div>
									</div>
									<div class="col-sm-4 border-right">
										<div class="description-block">
											<h5 class="description-header">Profile Created</h5>
											<span class="description-text">{{$id->created_at->day}}-{{$id->created_at->month}}-{{$id->created_at->year}}</span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="description-block">
											<h5 class="description-header">Last Login</h5>
											<span class="description-text">{{$logindate->updated_at->day}}-{{$logindate->updated_at->month}}-{{$logindate->updated_at->year}}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection