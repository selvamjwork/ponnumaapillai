@extends('layouts.guest')
@section('page_name') Registration  @endsection

@section('marquee')
<div class="container" id="marquee">
    <div class="row mt-5">
        <div class="col alert alert-warning">
            <marquee class="text-danger" behavior="scroll" direction="left" scrollamount="8">
                <h4>26-04-18 முதல் 28-04-18 வரை மதுரை மீனாட்சி திருகல்யாணத்தை முன்னிட்டு ஆன்லைனில் பதிவு செய்பவர்களுக்கு முற்றிலும் இலவசம். சுய விவரத்தை பூர்த்தி செய்த பின் 9940101795ஐ தொடர்பு கொள்ளவும்.</h4>
            </marquee>
        </div>
    </div>
</div>
@endsection

@section('heading') <div style="font-size: 16px" class="panel-heading text-center text-danger"><b> Registration&nbsp;&nbsp;</b><i class="fa fa-arrow-right">&nbsp;&nbsp;Create Profile &nbsp;&nbsp;</i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Payment Confirmation&nbsp;&nbsp; </i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Search Profile</i> </div> @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif

<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <form class="was-validated" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-sm-3 col-form-label">Name <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                <div class="col-xl-6 col-sm-9">
                    <input id="name" type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('gender') ? ' has-error ': '' }}">
                <label for="gender" class="col-sm-3 col-form-label">Gender <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                <div class="col-xl-9 col-sm-9">
                    <label class="radio-inline"><input id="gender" type="radio" value="1" required name="gender">Male</label>
                    <label class="radio-inline ml-3"><input id="gender" type="radio" value="2" required name="gender">Female</label>
                </div>
            </div>

            <div class="form-group row{{ $errors->has('dob') ? 'has-error' : ''}}">
                <label for="dob" class="col-sm-3 col-form">Date of Birth <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>
                <div class="col col-lg-3 mb-1 mt-1">
                    {!! Form::select('day', $dayArray, null, ['class' => 'form-control','required','placeholder'=>'-Day-']) !!}
                    {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-1 mt-1">
                    {!! Form::select('month', $monthArray, null, ['class' => 'form-control','required','placeholder'=>'-Month-']) !!}
                    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-1 mt-1">
                    {!! Form::select('year', $yearArray, null, ['class' => 'form-control','required','placeholder'=>'-Year-']) !!}
                    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                </div>                        
            </div>

            <div class="form-group row{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-sm-3 col-form">Mobile Number <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                <div class="col-md-6 col-sm-9">
                    <input id="mobile" placeholder="9078563412" type="number" maxlength="10" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>

                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('caste') ? ' has-error' : '' }}">
                <label for="caste" class="col-md-3 control-label">Caste <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                <div class="col-md-9">
                {!! Form::select('caste', $casteArray, null, ['class' => 'form-control','required','placeholder'=>'Select Caste']) !!}
                    @if ($errors->has('caste'))
                        <span class="help-block">
                            <strong>{{ $errors->first('caste') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-3 control-label">Password <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                <div class="col-md-6">
                    <input id="password" placeholder="************" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-3 control-label">Confirm Password <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span></label>

                <div class="col-md-6">
                    <input id="password-confirm" placeholder="************" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="col-md-6">
                <input id="email_verified" type="hidden" class="form-control" name="email_verified" value="1" required >

                @if ($errors->has('email_verified'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email_verified') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
