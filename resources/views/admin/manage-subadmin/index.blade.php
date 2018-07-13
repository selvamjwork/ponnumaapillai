@extends('admin.layout.home')

@section('content')
<div class="widget-box">
  	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    	<h5>User Table</h5>
  	</div>
  	<div class="widget-content nopadding">
    	<table class="table table-bordered data-table">
      		<thead class="text-center"><a href="{{ url('/admin/manage-subadmin/create') }}" class="btn btn-primary btn-xs" title="Add New User"><span class="icon icon-plus" aria-hidden="true"/></a></thead>
          <thead>
        		<tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Active Status</th>
                  <th>Actions</th>
        		</tr>
      		</thead>
      		<tbody>
      			@foreach($managesubadmin as $userdetails)
	                <tr class="gradeX">
	                  	<td>{{$userdetails->id}}</td>
	                  	<td>{{$userdetails->name}}</td>
	                  	<td>{{$userdetails->email}}</td>
	                  	<td>{{$userdetails->mobile}}</td>
                      <td>{{$userdetails->is_activated}}</td>
                      <td class="text-center"><a href="{{ url('/admin/manage-subadmin/' . $userdetails->id) }}" class="btn btn-success btn-xs" title="View"><span><i class="icon icon-eye-open"></i></span></a>
                      <a href="{{ url('/admin/manage-subadmin/' . $userdetails->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit "><span class="icon icon-pencil" aria-hidden="true"/></a>
                      {!! Form::open(['method'=>'DELETE','url' => ['/admin/manage-subadmin', $userdetails->id],
                        'style' => 'display:inline'
                      ]) !!}
                      {!! Form::button('<span class="icon icon-time" aria-hidden="true" title="Deactivate" />', array(
                              'type' => 'submit',
                              'class' => 'btn btn-danger btn-xs',
                              'title' => 'Deactivate',
                              'onclick'=>'return confirm("Confirm Deactivate?")'
                      )) !!}
                      {!! Form::close() !!}
                      <a href="{{ url('/admin/manage-subadmin/' . $userdetails->id . '/activate') }}" class="btn btn-info btn-xs" title="Activate"><span class="icon icon-check" aria-hidden="true"/></a>
                      </td>
	                </tr>
	            @endforeach
          </tbody>
    	</table>
  	</div>
    <div class="pagination"> {!! $managesubadmin->render() !!} </div>
</div> 

@endsection