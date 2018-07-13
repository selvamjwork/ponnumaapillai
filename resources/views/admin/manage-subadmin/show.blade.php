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
		        	<a href="{{ url('admin/manage-subadmin/' . $managesubadmin->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit"><span class="icon icon-pencil" aria-hidden="true"/></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> ID </th><td>{{ $managesubadmin->id }}</td></tr>
                                    <tr><th> Name </th><td> {{ $managesubadmin->name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $managesubadmin->email }} </td></tr>
                                    <tr><th> Mobile </th><td> {{ $managesubadmin->mobile }} </td></tr>
                                </tbody>
                            </table>
                        </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection