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
		          <form class="form-horizontal" method="POST" action="{{ url('/admin/manage-subadmin') }}">
		          {{ csrf_field() }}
		            <div class="control-group {{ $errors->has('name') ? 'has-error' : ''}}">
		            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('name', null, ['placeholder'=>'Name','class' => 'span11 form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('mobile', 'Mobile Number', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('mobile', null, ['placeholder'=>'Mobile Number','class' => 'span11 form-control']) !!}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::email('email', null, ['placeholder'=>'Email Address','class' => 'span11 form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

                    <div class="control-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('password', null, ['placeholder'=>'*********','class' => 'span11 form-control']) !!}
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

		            <div class="form-actions">
		              <button type="submit" class="pull-right btn btn-success">Create and Save</button>
		            </div>
		          </form>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection