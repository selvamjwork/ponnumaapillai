@extends('layouts.app')

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
        @section('title')<b>Edit user {{ ucfirst($user->name) }}</b>@endsection
        
{!! Form::model($user, ['method' => 'PATCH', 'url' => ['/user/update-profile3'],'class' => 'form-horizontal','files' => true]) !!}
	<div class="form-top">
            <div class="form-top-left">
                <h3>Step 3 / 3</h3>
                <p>Birth Details - பிறப்பு விவரங்கள்</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-birthday-cake"></i>
            </div>
        </div>
        <div class="form-bottom">
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                <div class="col-md-4">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('dob', 'Day (நாள்)', ['class' => 'control-label']) !!}
                        {!! Form::select('day', $dayArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-day (நாள்)-']) !!}
                        {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="col-md-4">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('dob', 'Month (மாதம்)', ['class' => 'control-label']) !!}
                        {!! Form::select('month', $monthArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Month (மாதம்)-']) !!}
                        {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-4">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('dob', 'Year (ஆண்டு)', ['class' => 'control-label']) !!}
                        {!! Form::select('year', $yearArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Year (ஆண்டு)-']) !!}
                        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                </div>                        
            </div>
            <div class="form-group {{ $errors->has('hour') ? 'has-error' : ''}}">
                <div class="col-md-3">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('hour', 'hh(மம):', ['class' => 'control-label']) !!}
                    {!! Form::select('hour', $hourArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-hh(மம):-']) !!}
                    {!! $errors->first('hour', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('minutes', 'mm(நிநி):', ['class' => 'control-label']) !!}
                    {!! Form::select('minutes', $minuteArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-mm(நிநி):-']) !!}
                    {!! $errors->first('minutes', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('seconds', 'ss (விவி)', ['class' => 'control-label']) !!}
                    {!! Form::select('seconds', $secondArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-ss (விவி)-']) !!}
                    {!! $errors->first('seconds', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-md-3">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('dob', 'Session', ['class' => 'control-label']) !!}
                    {{ Form::select('session', ['' => '-Session-','AM' => 'AM','PM' => 'PM'],null,['required' => 'required','class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('moonsign') ? 'has-error' : ''}}">
                <div class="col-md-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('moonsign', 'Moonsign (இராசி)', ['class' => 'control-label']) !!}
                    {!! Form::select('moonsign', $rasipalanArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Moonsign (இராசி)-']) !!}
                    {!! $errors->first('moonsign', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('star') ? 'has-error' : ''}}">
                <div class="col-md-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('star', 'Star (நட்சத்திரம்)', ['class' => 'control-label']) !!}
                    {!! Form::select('star', $starArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Star (நட்சத்திரம்)-']) !!}
                    {!! $errors->first('star', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pob') ? 'has-error' : ''}}">
                <div class="col-md-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('pob', 'Place of Birth (பிறந்த இடம்)', ['class' => 'control-label']) !!}
                    {!! Form::text('pob', null, ['required' => 'required','placeholder'=>'Place of Birth (பிறந்த இடம்)','class' => 'form-control']) !!}
                    {!! $errors->first('pob', '<p class="help-block">:message</p>') !!}
                </div>
                <input type="text" id="profile_completed" value="1" class="hidden" name="profile_completed">
            </div>
            <div class="form-group {{ $errors->has('aboutyourself') ? 'has-error' : ''}}">
                <div class="col-md-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('aboutyourself', 'About Yourself (உங்களை பற்றி)', ['class' => 'control-label']) !!}
                    {!! Form::textarea('aboutyourself', null, ['required' => 'required','placeholder'=>'About Yourself (உங்களை பற்றி)','class' => 'form-control']) !!}
                    {!! $errors->first('aboutyourself', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <a class="pull-left btn btn-primary" href="/user/update-profile2">Previous</a>
                    <button type="submit" class="pull-right btn btn-primary">Update Profile</button>
                </div>
            </div>
        </div>
{!! Form::close() !!}
@endsection