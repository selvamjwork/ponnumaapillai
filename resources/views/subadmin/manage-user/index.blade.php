@extends('subadmin.layout.home')

@section('content')
<table class="table table-striped projects">
  <thead><a href="{{ url('/subadmin/manage-user/create') }}" class="btn btn-primary btn-xs" title="Add New User"><i class="fa fa-plus" aria-hidden="true"> </i> Add New User</a></thead>
  <thead>
    <tr>
      <th style="width: 1%">Matri ID</th>
      <th style="width: 20%">Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Status</th>
      <th style="width: 20%">Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user as $us)
    <tr>
      <td>{{$us->user_id}}</td>
      <td>{{$us->name}}</td>
      <td>{{$us->email}}</td>
      <td>{{$us->mobile}}</td>
      <td>{{$us->active}}</td>
      <td>
        <a href="{{ url('/subadmin/manage-user/' . $us->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
        <a href="{{ url('/subadmin/manage-user/' . $us->id . '/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{!! $user->render() !!}
<!-- end project list -->
@endsection