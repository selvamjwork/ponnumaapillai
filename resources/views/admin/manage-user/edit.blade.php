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
		          {!! Form::model($user, ['method' => 'PATCH','url' => ['/admin/manage-user', $user->id],'class' => 'form-horizontal','files' => true ]) !!}
		          {{ csrf_field() }}
		            <div class="control-group {{ $errors->has('name') ? 'has-error' : ''}}">
                   <div class="controls"><img height="155" width="150" src="/images/uploads/profile_pic/{{ $user->profile_pic }}">
                    </div>
                    </div>
                    <div class="control-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('name', null, ['placeholder'=>'Name','class' => 'form-control span11']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="control-group {{ $errors->has('fathers_name') ? 'has-error' : ''}}">
                    {!! Form::label('fathers_name', 'Fathers Name', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('fathers_name', null, ['placeholder'=>'Fathers Name','class' => 'form-control span11']) !!}
                            {!! $errors->first('fathers_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('fathers_name') ? 'has-error' : ''}}">
                    {!! Form::label('fathers_occupation', 'Fathers Occupation', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('fathers_occupation', null, ['placeholder'=>'Fathers Occupation','class' => 'form-control span11']) !!}
                            {!! $errors->first('fathers_occupation', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('mothers_name') ? 'has-error' : ''}}">
                    {!! Form::label('mothers_name', 'Mothers Name', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('mothers_name', null, ['placeholder'=>'Mothers Name','class' => 'form-control span11']) !!}
                            {!! $errors->first('mothers_name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('mothers_name') ? 'has-error' : ''}}">
                        {!! Form::label('mothers_occupation', 'Mothers Occupation', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('mothers_occupation', null, ['placeholder'=>'Mothers Occupation','class' => 'form-control span11']) !!}
                            {!! $errors->first('mothers_occupation', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('gender') ? ' has-error ': '' }}">
                    <label for="gender" class="control-label">Gender</label>
                        <div class="controls">
                            <label class="radio-inline">{!! Form::radio('gender', '1', 'required') !!}Male</label>
                            <label class="radio-inline">{!! Form::radio('gender', '2', 'required') !!}Female</label>
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('noofbrothers') ? 'has-error' : ''}}">
                        {!! Form::label('noofbrothers', 'No Of Brothers', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('noofbrothers', null, ['placeholder'=>'(Ex:4)','class' => 'span11 form-control']) !!}
                            {!! $errors->first('noofbrothers', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('noofbrothers') ? 'has-error' : ''}}">
                        {!! Form::label('noofbrothersstatus', 'No Of Brothers Married', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('noofbrothersstatus', null, ['placeholder'=>'(ex:true;flase;ture;false)','class' => 'span11 form-control']) !!}
                            {!! $errors->first('noofbrothersstatus', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('noofsisters') ? 'has-error' : ''}}">
                        {!! Form::label('noofsisters', 'No Of Sisters', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('noofsisters', null, ['placeholder'=>'(Ex:4)','class' => 'span11 form-control']) !!}
                            {!! $errors->first('noofsisters', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('noofsisters') ? 'has-error' : ''}}">
                        {!! Form::label('noofsistersstatus', 'No Of Sisters Married', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('noofsistersstatus', null, ['placeholder'=>'(ex:true;flase;ture;false)','class' => 'span11 form-control']) !!}
                            {!! $errors->first('noofsistersstatus', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                        {!! Form::label('dob', 'Date of Birth', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('day', $dayArray, null, ['class' => 'form-control span4','placeholder'=>'-Day-']) !!}
                            {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
                        
                         	{!! Form::select('month', $monthArray, null, ['class' => 'form-control span4','placeholder'=>'-Month-']) !!}
                            {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                        
                            {!! Form::select('year', $yearArray, null, ['class' => 'form-control span4','placeholder'=>'-Year-']) !!}
                            {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                        </div>                        
                    </div>

                    <div class="control-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                    {!! Form::label('dob', 'Time Of Birth', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('hour', $hourArray, null, ['class' => 'form-control span3','placeholder'=>'-Hour-']) !!}
                            {!! $errors->first('hour', '<p class="help-block">:message</p>') !!}
                        
                            {!! Form::select('minutes', $minuteArray, null, ['class' => 'form-control span3','placeholder'=>'-Minute-']) !!}
                            {!! $errors->first('minutes', '<p class="help-block">:message</p>') !!}
                        
                            {!! Form::select('seconds', $secondArray, null, ['class' => 'form-control span3','placeholder'=>'-Second-']) !!}
                            {!! $errors->first('seconds', '<p class="help-block">:message</p>') !!}
                                              
                            {{ Form::select('session', ['' => '-Session-','AM' => 'AM','PM' => 'PM'],null,['class' => 'form-control span3']) }}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('graduate') ? 'has-error' : ''}}">
                    {!! Form::label('graduate', 'Degree', ['class' => 'control-label']) !!}
                        <div class="controls">
                             {!! Form::select('graduate', $graduateArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Degree-']) !!}
                            {!! $errors->first('graduate', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('height') ? 'has-error' : ''}}">
                    {!! Form::label('height', 'Height in CM', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('height', null, ['placeholder'=>'Height in CM','class' => 'span11 form-control']) !!}
                            {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('height') ? 'has-error' : ''}}">
                    {!! Form::label('weight', 'Weight in KG', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('weight', null, ['placeholder'=>'Weight In KG','class' => 'span11 form-control']) !!}
                            {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>  

                    <div class="control-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
                    {!! Form::label('qualification', 'Qualification', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('qualification', null, ['placeholder'=>'Qualification','class' => 'form-control span11']) !!}
                            {!! $errors->first('qualification', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>  

                    <div class="control-group {{ $errors->has('qualification') ? 'has-error' : ''}}">
                    {!! Form::label('monhtly_income', 'Monthly Income', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('annual_income', null, ['placeholder'=>'Monthly Income','class' => 'form-control span11']) !!}
                            {!! $errors->first('annual_income', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('mothers_tongue') ? 'has-error' : ''}}">
                    {!! Form::label('professional', 'Profession', ['class' => 'control-label']) !!}
                       <div class="controls">
                             {!! Form::select('professional', $professionalArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Profession-']) !!}
                            {!! $errors->first('professional', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('mothers_tongue') ? 'has-error' : ''}}">
                    {!! Form::label('mother_tongue', 'Mother Tongue', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('mother_tongue', $mothers_tongueArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Mother Tongue-']) !!}
                            {!! $errors->first('mother_tongue', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('caste') ? 'has-error' : ''}}">
                        {!! Form::label('religion', 'Religion', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('religion', null, ['placeholder'=>'Religion','class' => 'span11 form-control']) !!}
                            {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('caste') ? 'has-error' : ''}}">
                        {!! Form::label('caste', 'Caste', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::select('caste', $casteArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Caste-']) !!}
                            {!! $errors->first('caste', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <!-- <div class="control-group {{ $errors->has('gothram') ? 'has-error' : ''}}">
                        {!! Form::label('subsect', 'Subsect', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::select('subsect', [], null, ['class' => 'form-control span11','placeholder'=>'-Select Subsect-']) !!}
                            {!! $errors->first('subsect', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div> -->

                    <div class="control-group {{ $errors->has('gothram') ? 'has-error' : ''}}">
                        {!! Form::label('gothram', 'SubCaste/Kulam/Gothram', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('gothram', null, ['placeholder'=>'SubCaste/Kulam/Gothram','class' => 'form-control span11']) !!}
                            {!! $errors->first('gothram', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('star') ? 'has-error' : ''}}">
                    {!! Form::label('moonsign', 'Moonsign', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::select('moonsign', $rasipalanArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Moonsign-']) !!}
                            {!! $errors->first('moonsign', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('star') ? 'has-error' : ''}}">
                        {!! Form::label('star', 'Star', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::select('star', $starArray, null, ['class' => 'form-control span11','placeholder'=>'-Select Star-']) !!}
                            {!! $errors->first('star', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('pob') ? 'has-error' : ''}}">
                        {!! Form::label('pob', 'Place of Birth', ['class' => 'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('pob', null, ['placeholder'=>'Place of Birth','class' => 'form-control span11']) !!}
                            {!! $errors->first('pob', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="control-group {{ $errors->has('address') ? 'has-error' : ''}}">
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                        <div class="controls">                        
                            {!! Form::text('address', null, ['placeholder'=>'Address','class' => 'form-control span11']) !!}
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
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

                    <div class="control-group {{ $errors->has('payment_completed') ? ' has-error ': '' }}">
                    <label for="payment_completed" class="control-label">Payment Updated</label>
                        <div class="controls">
                            <label class="radio-inline">{!! Form::radio('payment_completed', '1', 'required') !!}Yes</label>
                            <label class="radio-inline">{!! Form::radio('payment_completed', '0', 'required') !!}No</label>
                        </div>
                    </div>

		            <div class="form-actions">
		              <button type="submit" class="pull-right btn btn-success">Update and Save</button>
		            </div>
		          </form>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
    $('#caste').on('change',function(){
        var val = ($(this).val());
        $.ajax({
            url:'/get-subsect/'+val,
            success:function(res){
                console.log(res);
                attach(res);
            },
        });
    });
    $(document).ready(function(){
        var val = $('#caste').val();
        if (!empty(val)) {
            $.ajax({
                url:'/get-subsect/'+val,
                success:function(res){
                    console.log(res);
                    attach(res);
                },
            });
        }
    });
    function attach(res){
        $('#subsect').empty();
        $('#subsect').append(res);
    }
@endsection