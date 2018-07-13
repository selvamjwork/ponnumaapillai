@extends('admin.layout.home')

@section('content')
<div class="container-fluid">  
  	<div class="row-fluid">
	    <div class="span8">  
		    <div class="widget-box">
		        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
		          <h5>User-Search</h5>
		        </div>
		        <div class="widget-content nopadding">
					<form class="form-horizontal" method="get">
					    <div class="widget-box">
					    	<div class="control-group {{ $errors->has('gender') ? ' has-error ': '' }}">
		                    	<label for="gender" class="control-label">Gender</label>
		                        <div class="controls">
		                            <label>{!! Form::radio('gender', '1', 'required') !!}Male</label>
		                            <label>{!! Form::radio('gender', '2', 'required') !!}Female</label>
		                        </div>
		                    </div>
					        <div class="control-group {{ $errors->has('graduate') ? 'has-error' : ''}}">
					        	{!! Form::label('graduate', 'Graduate', ['class' => 'control-label']) !!}
					        	<div class="controls">
					        		<select class="form-control span8" id="graduate" name="graduate" required>
					        			<option value="">-Graduate-</option>
					        			<option value="all">All Graduate</option>
					        			@foreach($graduate as $graduate)
					        			<option value="{{$graduate->id}}">{{$graduate->graduate_name}}</option>
					        			@endforeach
					        		</select>
					        	</div>

					        	<div class="control-group {{ $errors->has('star') ? 'has-error' : ''}}">
			                        {!! Form::label('star', 'Star', ['class' => 'control-label']) !!}
			                        <div class="controls">
			                            {!! Form::select('star', $starArray, null, ['class' => 'form-control span8','placeholder'=>'-Star-']) !!}
			                            {!! $errors->first('star', '<p class="help-block">:message</p>') !!}
			                        </div>
			                    </div>

					        	{!! Form::label('professional', 'Occupation', ['class' => 'control-label']) !!}
					        	<div class="controls">
					        		<select class="form-control span8" id="professional" name="professional" required>
					        			<option value="">-Occupation-</option>
					        			<option value="all">All Occupation</option>
					        			@foreach($professional as $professional)
					        			<option value="{{$professional->id}}">{{$professional->professional_name}}</option>
					        			@endforeach
					        		</select>
					        	</div>
					        </div>

					        <div class="control-group {{ $errors->has('caste') ? 'has-error' : ''}}">
					        	{!! Form::label('caste', 'Caste', ['class' => 'control-label']) !!}
					        	<div class="controls">
					        		<select class="form-control span8" id="caste" name="caste" required>
					        			<option value="">-Caste-</option>
					        			@foreach($caste as $caste)
					        			<option value="{{$caste->id}}">{{$caste->caste_name}}</option>
					        			@endforeach
					        		</select>
					        	</div>
					        	{!! Form::label('ageform', 'Age', ['class' => 'control-label']) !!}
					        	<div class="controls">
					        		<select class="form-control span4" id="ageform" name="ageform" required>
					        			<option value="">  Form </option>
					        			<option value="18">	18	</option>
										<option value="19">	19	</option>
										<option value="20">	20	</option>
										<option value="21">	21	</option>
										<option value="22">	22	</option>
										<option value="23">	23	</option>
										<option value="24">	24	</option>
										<option value="25">	25	</option>
										<option value="26">	26	</option>
										<option value="27">	27	</option>
										<option value="28">	28	</option>
										<option value="29">	29	</option>
										<option value="30">	30	</option>
										<option value="31">	31	</option>
										<option value="32">	32	</option>
										<option value="33">	33	</option>
										<option value="34">	34	</option>
										<option value="35">	35	</option>
										<option value="36">	36	</option>
										<option value="37">	37	</option>
										<option value="38">	38	</option>
										<option value="39">	39	</option>
										<option value="40">	40	</option>
										<option value="41">	41	</option>
										<option value="42">	42	</option>
										<option value="43">	43	</option>
										<option value="44">	44	</option>
										<option value="45">	45	</option>
										<option value="46">	46	</option>
										<option value="47">	47	</option>
										<option value="48">	48	</option>
										<option value="49">	49	</option>
										<option value="50">	50	</option>
										<option value="51">	51	</option>
										<option value="52">	52	</option>
										<option value="53">	53	</option>
										<option value="54">	54	</option>
										<option value="55">	55	</option>
										<option value="56">	56	</option>
										<option value="57">	57	</option>
										<option value="58">	58	</option>
										<option value="59">	59	</option>
										<option value="60">	60	</option>
					        		</select>
					        	
					        	<!-- {!! Form::label('ageto', 'To', ['class' => 'span2 control-label']) !!} -->
					        	
					        		<select class="form-control span4" id="ageto" name="ageto" required>
					        			<option value="">  To </option>
										<option value="19">	19	</option>
										<option value="20">	20	</option>
										<option value="21">	21	</option>
										<option value="22">	22	</option>
										<option value="23">	23	</option>
										<option value="24">	24	</option>
										<option value="25">	25	</option>
										<option value="26">	26	</option>
										<option value="27">	27	</option>
										<option value="28">	28	</option>
										<option value="29">	29	</option>
										<option value="30">	30	</option>
										<option value="31">	31	</option>
										<option value="32">	32	</option>
										<option value="33">	33	</option>
										<option value="34">	34	</option>
										<option value="35">	35	</option>
										<option value="36">	36	</option>
										<option value="37">	37	</option>
										<option value="38">	38	</option>
										<option value="39">	39	</option>
										<option value="40">	40	</option>
										<option value="41">	41	</option>
										<option value="42">	42	</option>
										<option value="43">	43	</option>
										<option value="44">	44	</option>
										<option value="45">	45	</option>
										<option value="46">	46	</option>
										<option value="47">	47	</option>
										<option value="48">	48	</option>
										<option value="49">	49	</option>
										<option value="50">	50	</option>
										<option value="51">	51	</option>
										<option value="52">	52	</option>
										<option value="53">	53	</option>
										<option value="54">	54	</option>
										<option value="55">	55	</option>
										<option value="56">	56	</option>
										<option value="57">	57	</option>
										<option value="58">	58	</option>
										<option value="59">	59	</option>
										<option value="60"> 60  </option>
					        		</select>
					        	</div>
					        	<div class="form-actions">
				                {!! Form::submit('Search', ['class' => 'pull-right btn btn-primary']) !!}
				            </div>
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection