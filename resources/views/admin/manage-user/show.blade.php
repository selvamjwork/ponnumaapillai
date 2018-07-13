@extends('admin.layout.home')

@section('content')
<div class="container-fluid">  
  	<div class="row-fluid">
	    <div class="span8">  
		    <div class="widget-box">
		        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
		          <h5>User-info</h5>
		        </div>
		        <div class="widget-content nopadding">
		        	<a href="{{ url('admin/manage-user/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit"><span class="icon icon-pencil" aria-hidden="true"/></a>
                       
                        <br/>
                        <br/>
                        <img height="155" width="150" src="/images/uploads/profile_pic/{{ $user->profile_pic }}">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> ID </th><td>{{ $user->id }}</td></tr>
                                    <tr><th> Matri ID </th><td>{{ $user->user_id }}</td></tr>
                                    <tr><th> Name </th><td> {{ $user->name }} </td></tr>
                                    <tr><th> Fathers Name </th><td> {{ $user->fathers_name }} </td></tr>
                                    <tr><th> Mothers Name </th><td> {{ $user->mothers_name }} </td></tr>
                                    <tr><th> Gender </th>@if($user->gender = 1)<td>Male</td>@else<td>Female</td>@endif</tr>
                                    <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                    <tr><th> Mobile Number </th><td> {{ $user->mobile }} </td></tr>
                                </tbody>
                            </table>
                        </div>

		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection