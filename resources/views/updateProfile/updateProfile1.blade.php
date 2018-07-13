@extends('layouts.app')

@section('page_name') Update Profile  @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </div>
    {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/user/update-profile1'],'files' => true]) !!}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 offset-md-2">
                    <div class="card card-danger card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img id="thumbnil" class="img-bordered elevation-1  mb-3" src="img/avatar5.png" height="200px" width="200px" alt="User Avatar">
                            </div>
                            <div class="form-group">
                                <label for="profile_pic">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" onchange="showMyImage(this)" name="profile_pic" class="custom-file-input" id="profile_pic">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Personal Details - சொந்த விவரங்கள்</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="name" class="control-label">Name (பெயர்)</label>
                                        {!! Form::text('name', null, ['readonly','required' => 'required','placeholder'=>'Name (பெயர்)','class' => 'form-control']) !!}
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="graduate" class="control-label">Degree (பட்டம்)</label>
                                        {!! Form::select('graduate', $graduateArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Degree (பட்டம்)-']) !!}
                                        {!! $errors->first('graduate', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="professional" class="control-label">Profession (தொழில்முறை)</label>
                                        {!! Form::select('professional', $professionalArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Profession (தொழில்முறை)-']) !!}
                                        {!! $errors->first('professional', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="mother_tongue" class="control-label">Mother Tongue (தாய் மொழி)</label>
                                        {!! Form::select('mother_tongue', $mothers_tongueArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Mother Tongue (தாய் மொழி)-']) !!}
                                        {!! $errors->first('mother_tongue', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="height" class="control-label">Height (உயரம்) in CM</label>
                                        <input type="text" name="height" onkeyup="checkInput(this)"/ maxlength="3" placeholder="Height (உயரம்) in CM" required value="<?php echo $user->height; ?>" class="form-control">
                                       <!--  {{ Form::number('height', null, array('placeholder' => 'Height (உயரம்) in CM','maxlength' => 3 )) }} -->
                                        {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="weight" class="control-label">Weight (எடை) in KG</label>
                                        <input type="text" name="weight" tonkeyup="checkInput(this)"/ maxlength="3" required placeholder="Weight (எடை) in KG" value="<?php echo $user->weight; ?>" class="form-control">
                                        {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="qualification" class="control-label">Qualification (கல்வி தகுதி)</label>
                                        {!! Form::text('qualification', null, ['required' => 'required','placeholder'=>'Qualification (கல்வி தகுதி)','class' => 'form-control']) !!}
                                        {!! $errors->first('qualification', '<p class="help-block">:message</p>') !!}

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="annual_income" class="control-label">Monthly Income (மாதாந்திர வருமானம்)</label>
                                        {!! Form::text('annual_income', null, ['required' => 'required','placeholder'=>'Monthly Income (மாதாந்திர வருமானம்)','class' => 'form-control']) !!}
                                        {!! $errors->first('annual_income', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="religion" class="control-label">Religion (மதம்)</label>
                                        {!! Form::text('religion', null, ['required' => 'required','placeholder'=>'Religion (மதம்)','class' => 'form-control']) !!}
                                        {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Family Details - குடும்ப விவரங்கள்</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-bottom">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                            <label for="fathers_name" class="control-label">Fathers Name (தந்தையின் பெயர்)</label>
                                            {!! Form::text('fathers_name', null, ['required' => 'required','placeholder'=>'Fathers Name (தந்தையின் பெயர்)','class' => 'form-control']) !!}
                                            {!! $errors->first('fathers_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                            <label for="fathers_occupation" class="control-label">Fathers Occupation (தந்தையின் தொழில்)</label>
                                            {!! Form::text('fathers_occupation', null, ['placeholder'=>'Fathers Occupation (தந்தையின் தொழில்)','required' => 'required','class' => 'form-control']) !!}
                                            {!! $errors->first('fathers_occupation', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                            <label for="mothers_name" class="control-label">Mothers Name (அம்மாவின் பெயர்)</label>
                                            {!! Form::text('mothers_name', null, ['required' => 'required','placeholder'=>'Mothers Name (அம்மாவின் பெயர்)','class' => 'form-control']) !!}
                                            {!! $errors->first('mothers_name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                            <label for="mothers_occupation" class="control-label">Mothers Occupation (அம்மாவின் தொழில்)</label>
                                            {!! Form::text('mothers_occupation', null, ['placeholder'=>'Mothers Occupation (அம்மாவின் தொழில்)','required' => 'required','class' => 'form-control']) !!}
                                            {!! $errors->first('mothers_occupation', '<p class="help-block">:message</p>') !!}

                                        </div>
                                    </div>
                                    <div class="form-group row{{ $errors->has('noofbrothers') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('noofbrothers', 'No Of Brothers (சகோதரர்களின் எண்ணிக்கை)', ['class' => 'control-label']) !!}
                                            <!-- {{ Form::select('noofbrothers', ['0' => '0','1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5 and Above'],null,['required' => 'required','class' => 'form-control']) }} -->
                                                     <div>
                                          <select required="required" id="noofbrothers" name="noofbrothers" class="form-control" onchange="render(value)">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2" selected="selected">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                          </select>

                                         </div>
                                            {!! $errors->first('noofbrothers', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row{{ $errors->has('noofbrothersstatus') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('noofbrothersstatus', 'No Of Brothers Married (எத்தனை சகோதரர்களுக்கு திருமணம் ஆனது)', ['class' => 'control-label']) !!}
                                          <!--   {{ Form::select('noofbrothersstatus', ['0' => '0','1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5 and Above'],null,['required' => 'required','class' => 'form-control']) }} -->
                                                   <div>
                                         <select name="noofbrothersstatus" id="noofbrothersstatus" onchange="setstatus(value)" class="form-control">
                                          <option><?php echo $user->noofbrothersstatus; ?></option>
                                         </select>
                                   </div>
                                            {!! $errors->first('noofbrothersstatus', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row{{ $errors->has('noofsisters') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('noofsisters', 'No Of Sisters (சகோதரிகளின் எண்ணிக்கை)', ['class' => 'control-label']) !!}
                                          <!--   {{ Form::select('noofsisters', ['0' => '0','1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5 and Above'],null,['required' => 'required','class' => 'form-control']) }} -->
                                                <select required="required" id="noofsisters" name="noofsisters" class="form-control" onchange="response(value)">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2" selected="selected">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                          </select>
                                            {!! $errors->first('noofsisters', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row{{ $errors->has('noofsistersstatus') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('noofsistersstatus', 'No Of Sisters Married (எத்தனை சகோதரிகளுக்கு  திருமணம் ஆனது)', ['class' => 'control-label']) !!}
                                         <!--    {{ Form::select('noofsistersstatus', ['0' => '0','1' => '1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','5 and Above'],null,['required' => 'required','class' => 'form-control']) }} -->
                                                         <div>
                                         <select name="noofsistersstatus" id="noofsistersstatus" onchange="setsister(value)" class="form-control">
                                          <option><?php echo $user->noofsistersstatus; ?></option>
                                         </select>
                                   </div>
                                            {!! $errors->first('noofsistersstatus', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group row{{ $errors->has('caste') ? 'has-error' : ''}}">
                                    <div class="col-md-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('caste', 'Caste (சாதி)', ['class' => 'control-label']) !!} {!! Form::select('caste', $casteArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Caste (சாதி)-']) !!} {!! $errors->first('caste', '
                                            <p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row{{ $errors->has('subsect') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('subsect', 'Subsect (உட்பிரிவு)', ['class' => 'control-label']) !!} {!! Form::select('subsect', [], null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Subsection (உட்பிரிவு)-']) !!} {!! $errors->first('subsect', '
                                            <p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div id="remove" class="form-group row{{ $errors->has('othersubsect') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('othersubsect', 'Ohter Subsect (மற்ற உட்பிரிவு)', ['class' => 'control-label']) !!} {!! Form::text('othersubsect', null, ['placeholder'=>'Ohter Subsect (மற்ற உட்பிரிவு)','class' => 'form-control']) !!} {!! $errors->first('othersubsect', '
                                            <p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="gothram" class="control-label">SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)</label>
                                            {!! Form::text('gothram', null, ['placeholder'=>'SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)','class' => 'form-control']) !!}
                                            {!! $errors->first('gothram', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                            <label for="aboutyourself" class="control-label">About Yourself (உங்களை பற்றி)</label>
                                            {!! Form::textarea('aboutyourself', null, ['required' => 'required','placeholder'=>'About Yourself (உங்களை பற்றி)','class' => 'form-control']) !!}
                                            {!! $errors->first('aboutyourself', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Birth Details - பிறப்பு விவரங்கள்</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-top-left">
                                    <p class="text-center"><b>Date of Birth</b></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-12 col-xl-4 col-lg-4">
                                        <label for="dob" class="control-label">Day (நாள்)</label>
                                        {!! Form::select('day', $dayArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-day (நாள்)-']) !!}
                                        {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
                                    </div>

                                    <div class="col-sm-12 col-12 col-xl-4 col-lg-4">
                                        <label for="dob" class="control-label">Month (மாதம்)</label>
                                        {!! Form::select('month', $monthArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Month (மாதம்)-']) !!}
                                        {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-sm-12 col-12 col-xl-4 col-lg-4">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="dob" class="control-label">Year (ஆண்டு)</label>
                                        {!! Form::select('year', $yearArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Year (ஆண்டு)-']) !!}
                                        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-top-left ">
                                    <p class="text-center"><b>Time of Birth</b></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="hour" class="control-label">hh(மம):</label>
                                        {!! Form::select('hour', $hourArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-hh(மம):-']) !!}
                                        {!! $errors->first('hour', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="col-md-3">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="minutes" class="control-label">mm(நிநி):</label>
                                        {!! Form::select('minutes', $minuteArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-mm(நிநி):-']) !!}
                                        {!! $errors->first('minutes', '<p class="help-block">:message</p>') !!}

                                    </div>
                                    <div class="col-md-3">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="seconds" class="control-label">ss (விவி)</label>
                                        {!! Form::select('seconds', $secondArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-ss (விவி)-']) !!}
                                        {!! $errors->first('seconds', '<p class="help-block">:message</p>') !!}

                                    </div>
                                    <div class="col-md-3">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="dob" class="control-label">Session</label>
                                        {{ Form::select('session', ['' => '-Session-','AM' => 'AM','PM' => 'PM'],null,['required' => 'required','class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="moonsign" class="control-label">Place of Birth (பிறந்த இடம்)</label>
                                    </div>
                                    <div class="col-8">
                                        {!! Form::text('pob', null, ['required' => 'required','placeholder'=>'Place of Birth (பிறந்த இடம்)','class' => 'form-control']) !!}
                                        {!! $errors->first('pob', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="moonsign" class="control-label">Moonsign (இராசி)</label>
                                    </div>
                                    <div class="col-8">
                                        {!! Form::select('moonsign', $rasipalanArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Moonsign (இராசி)-']) !!}
                                        {!! $errors->first('moonsign', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                        <label for="star" class="control-label">Star (நட்சத்திரம்)</label>
                                    </div>
                                    <div class="col-8">
                                        {!! Form::select('star', $starArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Star (நட்சத்திரம்)-']) !!}
                                        {!! $errors->first('star', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-xl-4">
                                        <label for="dosatype" class="control-label">Dasa Type (தசா):</label>
                                    </div>
                                    <div class="col-xl-8">
                                        {!! Form::select('dosatype', $dosatypeArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Dasa (தசா)-']) !!}
                                        {!! $errors->first('dosatype', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-xl-4">
                                        <label for="dosham" class="control-label">Dosham(தோஷம்):</label>
                                    </div>
                                    <div class="col-12 col-xl-8">
                                        {!! Form::select('dosham', $doshamArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Dosham(தோஷம்)-']) !!}
                                        {!! $errors->first('star', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <!-- <div class="form-top-left">
                                    <p class="text-center"><b>Birth Balance Dasa</b></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="dob" class="control-label">Year (ஆண்டு)</label>
                                        <select required="required" class="form-control" name="year">
                                            <option value="">-Year (ஆண்டு)-</option>
                                            <option value="1950">1950</option>
                                            <option value="1951">1951</option>
                                            <option value="1952">1952</option>
                                            <option value="1953">1953</option>
                                            <option value="1954">1954</option>
                                            <option value="1955">1955</option>
                                            <option value="1956">1956</option>
                                            <option value="1957">1957</option>
                                            <option value="1958">1958</option>
                                            <option value="1959">1959</option>
                                            <option value="1960">1960</option>
                                            <option value="1961">1961</option>
                                            <option value="1962">1962</option>
                                            <option value="1963">1963</option>
                                            <option value="1964">1964</option>
                                            <option value="1965">1965</option>
                                            <option value="1966">1966</option>
                                            <option value="1967">1967</option>
                                            <option value="1968">1968</option>
                                            <option value="1969">1969</option>
                                            <option value="1970">1970</option>
                                            <option value="1971">1971</option>
                                            <option value="1972">1972</option>
                                            <option value="1973">1973</option>
                                            <option value="1974">1974</option>
                                            <option value="1975">1975</option>
                                            <option value="1976">1976</option>
                                            <option value="1977">1977</option>
                                            <option value="1978">1978</option>
                                            <option value="1979">1979</option>
                                            <option value="1980">1980</option>
                                            <option value="1981">1981</option>
                                            <option value="1982">1982</option>
                                            <option value="1983">1983</option>
                                            <option value="1984">1984</option>
                                            <option value="1985" selected="selected">1985</option>
                                            <option value="1986">1986</option>
                                            <option value="1987">1987</option>
                                            <option value="1988">1988</option>
                                            <option value="1989">1989</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                        </select>

                                    </div>
                                    <div class="col-12">
                                        <label for="dob" class="control-label">Month (மாதம்)</label>
                                        <select required="required" class="form-control" name="month">
                                            <option value="">-Month (மாதம்)-</option>
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                            <option value="6">06</option>
                                            <option value="7" selected="selected">07</option>
                                            <option value="8">08</option>
                                            <option value="9">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>

                                    </div>
                                    <div class="col-12">
                                        <label for="dob" class="control-label">Day (நாள்)</label>
                                        <select required="required" class="form-control" name="day">
                                            <option value="">-day (நாள்)-</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29" selected="selected">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="offset-sm-0 col-sm-12 col-12 col-md-4">
                                        <table width="200" border="0" align="center" cellPadding="3" cellSpacing="0">
                                            <tr>
                                                <td align="middle">
                                                    <table cellSpacing="0" cellPadding="2" align="center" border="0">
                                                        <tr>
                                                            <td valign="top"><strong class="h1dp">Choose Raasi Below </strong>
                                                                <table cellSpacing="0" cellPadding="2" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>சூரியன் / Sun</td>
                                                                            <td>{!! Form::select('raasi_sun', $monthArray, null, ['class'=>'raasi_sun','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சந்திரன் / Moon</td>
                                                                            <td>{!! Form::select('raasi_moon', $monthArray, null, ['class'=>'raasi_moon','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>செவ்வாய் / Mars</td>
                                                                            <td>{!! Form::select('raasi_mars', $monthArray, null, ['class'=>'raasi_mars','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>புதன் / Mercury</td>
                                                                            <td>{!! Form::select('raasi_mercury', $monthArray, null, ['class'=>'raasi_mercury','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>குரு / Jupiter</td>
                                                                            <td>{!! Form::select('raasi_jupiter', $monthArray, null, ['class'=>'raasi_jupiter','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சுக்ரன் / Venus</td>
                                                                            <td>{!! Form::select('raasi_venus', $monthArray, null, ['class'=>'raasi_venus','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சனி / Saturn</td>
                                                                            <td>{!! Form::select('raasi_saturn', $monthArray, null, ['class'=>'raasi_saturn','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>ராகு / Raagu </td>
                                                                            <td>{!! Form::select('raasi_raagu', $monthArray, null, ['class'=>'raasi_raagu','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>கேது / Kethu </td>
                                                                            <td>{!! Form::select('raasi_kethu', $monthArray, null, ['class'=>'raasi_kethu','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>லக்கனம் / Lagna </td>
                                                                            <td>{!! Form::select('raasi_lagna', $monthArray, null, ['class'=>'raasi_lagna','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="offset-sm-0 col-sm-12 col-12 col-md-8 mt-3">
                                        <table width="auto" border="0" align="center" cellPadding="3" cellSpacing="0">
                                            <tr>
                                                <td valign="top">
                                                    <table border="1" cellPadding="5" cellSpacing="1" bordercolor="#f56954">
                                                        <tdbody>
                                                            <tr>
                                                                <td id="rTD1" align="middle" width="80" height="80"></td>
                                                                <td id="rTD2" align="middle" width="80" height="80"></td>
                                                                <td id="rTD3" align="middle" width="80" height="80"></td>
                                                                <td id="rTD4" align="middle" width="80" height="80"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="rTD5" align="middle" width="80" height="80"></td>
                                                                <td align="middle" colSpan="2" rowSpan="2">
                                                                    <div align="center"> <font size="3"><b>RAASI - ராசி</b></font> </div>
                                                                </td>
                                                                <td id="rTD6" align="middle" width="80" height="80"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="rTD7" align="middle" width="80" height="80"></td>
                                                                <td id="rTD8" align="middle" width="80" height="80"></td>
                                                            </tr>
                                                            <tr>
                                                                <td id="rTD9" align="middle" width="80" height="80"></td>
                                                                <td id="rTD10" align="middle" width="80" height="80"></td>
                                                                <td id="rTD11" align="middle" width="80" height="80"></td>
                                                                <td id="rTD12" align="middle" width="80" height="80"></td>
                                                            </tr>
                                                        </tdbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-0 col-sm-12 col-12 col-pd-3 col-xl-4 col-lg-4 col-md-4">
                                        <table width="200" border="0" align="center" cellPadding="3" cellSpacing="0">
                                            <tr>
                                                <td align="middle">
                                                    <table cellSpacing="0" cellPadding="2" align="center" border="0">
                                                        <tr>
                                                            <td valign="top"><strong class="h1dp">Choose Amsam Below </strong>
                                                                <table cellSpacing="0" cellPadding="2" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>சூரியன் / Sun</td>
                                                                            <td>{!! Form::select('amsam_sun', $monthArray, null,['class'=>'amsam_sun','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சந்திரன் / Moon</td>
                                                                            <td>{!! Form::select('amsam_moon', $monthArray, null, ['class'=>'amsam_moon','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>செவ்வாய் / Mars</td>
                                                                            <td>{!! Form::select('amsam_mars', $monthArray, null, ['class'=>'amsam_mars','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>புதன் / Mercury</td>
                                                                            <td>{!! Form::select('amsam_mercury', $monthArray, null, ['class'=>'amsam_mercury','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>குரு / Jupiter</td>
                                                                            <td>{!! Form::select('amsam_jupiter', $monthArray, null, ['class'=>'amsam_jupiter','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சுக்ரன் / Venus</td>
                                                                            <td>{!! Form::select('amsam_venus', $monthArray, null, ['class'=>'amsam_venus','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>சனி / Saturn</td>
                                                                            <td>{!! Form::select('amsam_saturn', $monthArray, null, ['class'=>'amsam_saturn','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>ராகு / Raagu </td>
                                                                            <td>{!! Form::select('amsam_raagu', $monthArray, null, ['class'=>'amsam_raagu','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>கேது / Kethu </td>
                                                                            <td>{!! Form::select('amsam_kethu', $monthArray, null, ['class'=>'amsam_kethu','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>லக்கனம் / Lagna </td>
                                                                            <td>{!! Form::select('amsam_lagna', $monthArray, null, ['class'=>'amsam_lagna','placeholder'=>'00']) !!}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="offset-sm-0 col-sm-12 col-12 col-md-8 mt-3">
                                        <table width="auto" border="0" align="center" cellPadding="3" cellSpacing="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="top">
                                                        <table border="1" cellPadding="5" cellSpacing="1" bordercolor="#f56954">
                                                            <tdbody>
                                                                <tr>
                                                                    <td id="aTD1" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD2" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD3" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD4" align="middle" width="80" height="80"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD5" align="middle" width="80" height="80"></td>
                                                                    <td align="middle" colSpan="2" rowSpan="2">
                                                                        <div align="center"> <font size="3"><b>AMSAM - அம்சம்</b></font> </div>
                                                                    </td>
                                                                    <td id="aTD6" align="middle" width="80" height="80"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD7" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD8" align="middle" width="80" height="80"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD9" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD10" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD11" align="middle" width="80" height="80"></td>
                                                                    <td id="aTD12" align="middle" width="80" height="80"></td>
                                                                </tr>
                                                            </tdbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Contact Details - தொடர்பு விபரங்கள்</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="mobile" class="control-label">Mobile Number (கைபேசி எண்)</label>
                                   {!! Form::number('mobile', null, ['required' => 'required','placeholder'=>'Mobile Number (கைபேசி எண்)','class' => 'form-control']) !!} 
                                   {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="control-label">Email Address (மின்னஞ்சல் முகவரி)</label>
                                    {!! Form::email('email', null, ['placeholder'=>'Email Address (மின்னஞ்சல் முகவரி)','class' => 'form-control']) !!} {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>
                                    <label for="address" class="control-label">Address (முகவரி)</label>
                                    {!! Form::textarea('address', null, ['required' => 'required','placeholder'=>'Address (முகவரி)','class' => 'form-control']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}

                                </div>
                            </div>
                            <div class=" row">
                                <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                                    <button type="submit" class="btn btn-danger">Update My Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::close() !!}
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    
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
        if(!(val=='')){
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
    $('#subsect').find('option')
        .remove()
        .end();

    $('#subsect').append(res);

    $("#subsect").append('<option value="others">Others</option>');

    var subset = {{auth()->user()->subsect}}
        if(subset != ''){
            $('#subsect').val(subset);
        }
    }
    $(document).ready(function(){
        checkSubsectStatus();
       
        $('#subsect').on('change',function(){
            checkSubsectStatus();
        });
    });

    function changeSubsectLook(status){
        $('#othersubsect').parentsUntil('form').css({'display':status});
    }

    function checkSubsectStatus(){
        var val = $('#subsect').val();
        if(val != 'others'){
            document.getElementById("remove").classList.add("d-none");
        }else{
            document.getElementById("remove").classList.remove("d-none");
        }
    }


    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    function checkInput(ob) {
        var invalidChars = /[^0-9]/gi
        if(invalidChars.test(ob.value)) {
            ob.value = ob.value.replace(invalidChars,"");
        }
    }

    function goBack() {
        window.history.back();
    }
    var numOfBrothers = null;
    var numOfBrotherStatus = null;

    function render(value) {
        numOfBrothers = value;
        document.getElementById('noofbrothersstatus').innerHTML = '';
        var option = '';
        for (var i = 0;i<= value;i++) {
            option += '<option value=' + i + '>' + i + '</option>'
        }
        document.getElementById('noofbrothersstatus').innerHTML = option;
    }
    function setstatus(val){
        numOfBrotherStatus = val;
    }

    var numOfsisters = null;
    var numOfsisterStatus = null;

    function response(value) {
        numOfsisters = value;
        document.getElementById('noofsistersstatus').innerHTML = '';
        var option = '';
        for (var i = 0;i<= value;i++) {
            option += '<option value=' + i + '>' + i + '</option>'
        }
        document.getElementById('noofsistersstatus').innerHTML = option;
    }

    function setsister(val){
        numOfsisterStatus = val;
    }
    $(function() {
        $('[name=noofbrothers] option').filter(function() { 
            return ($(this).html() == '<?php echo $user->noofbrothers; ?>'); //to select value from database
        }).prop('selected', true);
    })
    $(function() {
        $('[name=noofsisters] option').filter(function() { 
            return ($(this).html() == '<?php echo $user->noofsisters; ?>'); //to select value from database
        }).prop('selected', true);
    })

    $('.raasi_sun').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rsun1'> சூரியன் / Sun <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rsun2'> சூரியன் / Sun <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rsun1').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rsun3'> சூரியன் / Sun <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rsun4'> சூரியன் / Sun <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rsun6'> சூரியன் / Sun <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rsun8'> சூரியன் / Sun <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rsun12'> சூரியன் / Sun <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rsun11'> சூரியன் / Sun <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rsun10'> சூரியன் / Sun <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rsun9'> சூரியன் / Sun <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rsun7'> சூரியன் / Sun <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rsun5'> சூரியன் / Sun <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
        else{
            $('#rsun1').remove();$('#rsun2').remove();$('#rsun3').remove();$('#rsun4').remove();
            $('#rsun5').remove();$('#rsun6').remove();$('#rsun7').remove();$('#rsun8').remove();$('#rsun9').remove();$('#rsun10').remove();$('#rsun11').remove();$('#rsun12').remove();
        }
    });
    
    $('.raasi_moon').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rmoon1'> சந்திரன் / Moon <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rmoon2'> சந்திரன் / Moon <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rmoon3'> சந்திரன் / Moon <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rmoon4'> சந்திரன் / Moon <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rmoon6'> சந்திரன் / Moon <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rmoon8'> சந்திரன் / Moon <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rmoon12'> சந்திரன் / Moon <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rmoon11'> சந்திரன் / Moon <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rmoon10'> சந்திரன் / Moon <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rmoon9'> சந்திரன் / Moon <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rmoon7'> சந்திரன் / Moon <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else  if(val == 12){
            var newRowContent = "<span id='rmoon5'> சந்திரன் / Moon <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
        else{
            $('#rmoon1').remove();$('#rmoon2').remove();$('#rmoon3').remove();$('#rmoon4').remove();
            $('#rmoon5').remove();$('#rmoon6').remove();$('#rmoon7').remove();$('#rmoon8').remove();$('#rmoon9').remove();$('#rmoon10').remove();$('#rmoon11').remove();$('#rmoon12').remove();
        }
    });

    $('.raasi_mars').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rmars1'> செவ்வாய் / Mars <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rmars2'> செவ்வாய் / Mars <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rmars1').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rmars3'> செவ்வாய் / Mars <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rmars4'> செவ்வாய் / Mars <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rmars6'> செவ்வாய் / Mars <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rmars8'> செவ்வாய் / Mars <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rmars12'> செவ்வாய் / Mars <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rmars11'> செவ்வாய் / Mars <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rmars10'> செவ்வாய் / Mars <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rmars9'> செவ்வாய் / Mars <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rmars7'> செவ்வாய் / Mars <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else  if(val == 12){
            var newRowContent = "<span id='rmars5'> செவ்வாய் / Mars <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
        else{
            $('#rmars1').remove();$('#rmars2').remove();$('#rmars3').remove();$('#rmars4').remove();
            $('#rmars5').remove();$('#rmars6').remove();$('#rmars7').remove();$('#rmars8').remove();$('#rmars9').remove();$('#rmars10').remove();$('#rmars11').remove();$('#rmars12').remove();
        }
    });

    $('.raasi_mercury').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rmercury1'> புதன் / Mercury <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rmercury2'> புதன் / Mercury <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rmercury3'> புதன் / Mercury <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rmercury4'> புதன் / Mercury <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rmercury6'> புதன் / Mercury <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rmercury8'> புதன் / Mercury <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rmercury12'> புதன் / Mercury <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rmercury11'> புதன் / Mercury <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rmercury10'> புதன் / Mercury <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rmercury9'> புதன் / Mercury <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rmercury7'> புதன் / Mercury <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rmercury5'> புதன் / Mercury <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
        else{
            $('#rmercury1').remove();$('#rmercury2').remove();$('#rmercury3').remove();$('#rmercury4').remove();
            $('#rmercury5').remove();$('#rmercury6').remove();$('#rmercury7').remove();$('#rmercury8').remove();$('#rmercury9').remove();$('#rmercury10').remove();$('#rmercury11').remove();$('#rmercury12').remove();
        }
    });

    $('.raasi_jupiter').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rjupiter1'> குரு / Jupiter <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rjupiter2'> குரு / Jupiter <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rjupiter3'> குரு / Jupiter <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rjupiter4'> குரு / Jupiter <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rjupiter6'> குரு / Jupiter <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rjupiter8'> குரு / Jupiter <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rjupiter12'> குரு / Jupiter <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rjupiter11'> குரு / Jupiter <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rjupiter10'> குரு / Jupiter <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rjupiter9'> குரு / Jupiter <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rjupiter7'> குரு / Jupiter <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rjupiter5'> குரு / Jupiter <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
        else{
            $('#rjupiter1').remove();$('#rjupiter2').remove();$('#rjupiter3').remove();$('#rjupiter4').remove();
            $('#rjupiter5').remove();$('#rjupiter6').remove();$('#rjupiter7').remove();$('#rjupiter8').remove();$('#rjupiter9').remove();$('#rjupiter10').remove();$('#rjupiter11').remove();$('#rjupiter12').remove();
        }
    });

    $('.raasi_venus').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rvenus1'> சுக்ரன் / Venus <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rvenus2'> சுக்ரன் / Venus <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rvenus3'> சுக்ரன் / Venus <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rvenus4'> சுக்ரன் / Venus <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rvenus6'> சுக்ரன் / Venus <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rvenus8'> சுக்ரன் / Venus <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rvenus12'> சுக்ரன் / Venus <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rvenus11'> சுக்ரன் / Venus <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rvenus10'> சுக்ரன் / Venus <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rvenus9'> சுக்ரன் / Venus <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rvenus7'> சுக்ரன் / Venus <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rvenus5'> சுக்ரன் / Venus <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
        else{
            $('#rvenus1').remove();$('#rvenus2').remove();$('#rvenus3').remove();$('#rvenus4').remove();
            $('#rvenus5').remove();$('#rvenus6').remove();$('#rvenus7').remove();$('#rvenus8').remove();$('#rvenus9').remove();$('#rvenus10').remove();$('#rvenus11').remove();$('#rvenus12').remove();
        }
    });

    $('.raasi_saturn').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rsaturn1'> சனி / Saturn <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rsaturn2'> சனி / Saturn <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rsaturn3'> சனி / Saturn <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rsaturn4'> சனி / Saturn <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rsaturn6'> சனி / Saturn <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rsaturn8'> சனி / Saturn <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rsaturn12'> சனி / Saturn <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rsaturn11'> சனி / Saturn <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rsaturn10'> சனி / Saturn <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rsaturn9'> சனி / Saturn <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rsaturn7'> சனி / Saturn <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rsaturn5'> சனி / Saturn <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
        else{
            $('#rsaturn1').remove();$('#rsaturn2').remove();$('#rsaturn3').remove();$('#rsaturn4').remove();
            $('#rsaturn5').remove();$('#rsaturn6').remove();$('#rsaturn7').remove();$('#rsaturn8').remove();$('#rsaturn9').remove();$('#rsaturn10').remove();$('#rsaturn11').remove();$('#rsaturn12').remove();
        }
    });

    $('.raasi_raagu').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rraagu1'> ராகு / Raagu <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rraagu2'> ராகு / Raagu <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rraagu3'> ராகு / Raagu <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rraagu4'> ராகு / Raagu <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rraagu6'> ராகு / Raagu <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rraagu8'> ராகு / Raagu <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rraagu12'> ராகு / Raagu <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rraagu11'> ராகு / Raagu <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rraagu10'> ராகு / Raagu <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rraagu9'> ராகு / Raagu <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rraagu7'> ராகு / Raagu <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rraagu5'> ராகு / Raagu <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
        else{
            $('#rraagu1').remove();$('#rraagu2').remove();$('#rraagu3').remove();$('#rraagu4').remove();
            $('#rraagu5').remove();$('#rraagu6').remove();$('#rraagu7').remove();$('#rraagu8').remove();$('#rraagu9').remove();$('#rraagu10').remove();$('#rraagu11').remove();$('#rraagu12').remove();
        }
    });

    $('.raasi_kethu').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rkethu1'> கேது / Kethu <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rkethu2'> கேது / Kethu <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rkethu3'> கேது / Kethu <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rkethu4'> கேது / Kethu <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rkethu6'> கேது / Kethu <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rkethu8'> கேது / Kethu <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rkethu12'> கேது / Kethu <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rkethu11'> கேது / Kethu <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rkethu10'> கேது / Kethu <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rkethu9'> கேது / Kethu <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rkethu7'> கேது / Kethu <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rkethu5'> கேது / Kethu <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
        else{
            $('#rkethu1').remove();$('#rkethu2').remove();$('#rkethu3').remove();$('#rkethu4').remove();
            $('#rkethu5').remove();$('#rkethu6').remove();$('#rkethu7').remove();$('#rkethu8').remove();$('#rkethu9').remove();$('#rkethu10').remove();$('#rkethu11').remove();$('#rkethu12').remove();
        }
    });

    $('.raasi_lagna').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='rlagna1'> லக்கனம் / Lagna <br></span>";
            $('#rTD1').append(newRowContent);
            $('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='rlagna2'> லக்கனம் / Lagna <br></span>";
            $('#rTD2').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='rlagna3'> லக்கனம் / Lagna <br></span>";
            $('#rTD3').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='rlagna4'> லக்கனம் / Lagna <br></span>";
            $('#rTD4').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='rlagna6'> லக்கனம் / Lagna <br></span>";
            $('#rTD6').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='rlagna8'> லக்கனம் / Lagna <br></span>";
            $('#rTD8').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='rlagna12'> லக்கனம் / Lagna <br></span>";
            $('#rTD12').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='rlagna11'> லக்கனம் / Lagna <br></span>";
            $('#rTD11').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='rlagna10'> லக்கனம் / Lagna <br></span>";
            $('#rTD10').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='rlagna9'> லக்கனம் / Lagna <br></span>";
            $('#rTD9').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='rlagna7'> லக்கனம் / Lagna <br></span>";
            $('#rTD7').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='rlagna5'> லக்கனம் / Lagna <br></span>";
            $('#rTD5').append(newRowContent);
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
        else{
            $('#rlagna1').remove();$('#rlagna2').remove();$('#rlagna3').remove();$('#rlagna4').remove();
            $('#rlagna5').remove();$('#rlagna6').remove();$('#rlagna7').remove();$('#rlagna8').remove();$('#rlagna9').remove();$('#rlagna10').remove();$('#rlagna11').remove();$('#rlagna12').remove();
        }
    });
    
    $('.amsam_sun').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='asun1'> சூரியன் / Sun <br></span>";
            $('#aTD1').append(newRowContent);
            $('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='asun2'> சூரியன் / Sun <br></span>";
            $('#aTD2').append(newRowContent);
            $('#asun1').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='asun3'> சூரியன் / Sun <br></span>";
            $('#aTD3').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='asun4'> சூரியன் / Sun <br></span>";
            $('#aTD4').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='asun6'> சூரியன் / Sun <br></span>";
            $('#aTD6').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='asun8'> சூரியன் / Sun <br></span>";
            $('#aTD8').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='asun12'> சூரியன் / Sun <br></span>";
            $('#aTD12').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='asun11'> சூரியன் / Sun <br></span>";
            $('#aTD11').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='asun10'> சூரியன் / Sun <br></span>";
            $('#aTD10').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='asun9'> சூரியன் / Sun <br></span>";
            $('#aTD9').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='asun7'> சூரியன் / Sun <br></span>";
            $('#aTD7').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='asun5'> சூரியன் / Sun <br></span>";
            $('#aTD5').append(newRowContent);
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
        else{
            $('#asun1').remove();$('#asun2').remove();$('#asun3').remove();$('#asun4').remove();
            $('#asun5').remove();$('#asun6').remove();$('#asun7').remove();$('#asun8').remove();$('#asun9').remove();$('#asun10').remove();$('#asun11').remove();$('#asun12').remove();
        }
    });
    
    $('.amsam_moon').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='amoon1'> சந்திரன் / Moon <br></span>";
            $('#aTD1').append(newRowContent);
            $('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='amoon2'> சந்திரன் / Moon <br></span>";
            $('#aTD2').append(newRowContent);
            $('#amoon1').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='amoon3'> சந்திரன் / Moon <br></span>";
            $('#aTD3').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='amoon4'> சந்திரன் / Moon <br></span>";
            $('#aTD4').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='amoon6'> சந்திரன் / Moon <br></span>";
            $('#aTD6').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='amoon8'> சந்திரன் / Moon <br></span>";
            $('#aTD8').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='amoon12'> சந்திரன் / Moon <br></span>";
            $('#aTD12').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='amoon11'> சந்திரன் / Moon <br></span>";
            $('#aTD11').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='amoon10'> சந்திரன் / Moon <br></span>";
            $('#aTD10').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='amoon9'> சந்திரன் / Moon <br></span>";
            $('#aTD9').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='amoon7'> சந்திரன் / Moon <br></span>";
            $('#aTD7').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='amoon5'> சந்திரன் / Moon <br></span>";
            $('#aTD5').append(newRowContent);
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
        else{
            $('#amoon1').remove();$('#amoon2').remove();$('#amoon3').remove();$('#amoon4').remove();
            $('#amoon5').remove();$('#amoon6').remove();$('#amoon7').remove();$('#amoon8').remove();$('#amoon9').remove();$('#amoon10').remove();$('#amoon11').remove();$('#amoon12').remove();
        }
    });

    $('.amsam_mars').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='amars1'> செவ்வாய் / Mars <br></span>";
            $('#aTD1').append(newRowContent);
            $('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='amars2'> செவ்வாய் / Mars <br></span>";
            $('#aTD2').append(newRowContent);
            $('#amars1').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='amars3'> செவ்வாய் / Mars <br></span>";
            $('#aTD3').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='amars4'> செவ்வாய் / Mars <br></span>";
            $('#aTD4').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='amars6'> செவ்வாய் / Mars <br></span>";
            $('#aTD6').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='amars8'> செவ்வாய் / Mars <br></span>";
            $('#aTD8').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='amars12'> செவ்வாய் / Mars <br></span>";
            $('#aTD12').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='amars11'> செவ்வாய் / Mars <br></span>";
            $('#aTD11').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='amars10'> செவ்வாய் / Mars <br></span>";
            $('#aTD10').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='amars9'> செவ்வாய் / Mars <br></span>";
            $('#aTD9').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='amars7'> செவ்வாய் / Mars <br></span>";
            $('#aTD7').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='amars5'> செவ்வாய் / Mars <br></span>";
            $('#aTD5').append(newRowContent);
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
        else{
            $('#amars1').remove();$('#amars2').remove();$('#amars3').remove();$('#amars4').remove();
            $('#amars5').remove();$('#amars6').remove();$('#amars7').remove();$('#amars8').remove();$('#amars9').remove();$('#amars10').remove();$('#amars11').remove();$('#amars12').remove();
        }
    });

    $('.amsam_mercury').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='amercury1'> புதன் / Mercury <br></span>";
            $('#aTD1').append(newRowContent);
            $('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='amercury2'> புதன் / Mercury <br></span>";
            $('#aTD2').append(newRowContent);
            $('#amercury1').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='amercury3'> புதன் / Mercury <br></span>";
            $('#aTD3').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='amercury4'> புதன் / Mercury <br></span>";
            $('#aTD4').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='amercury6'> புதன் / Mercury <br></span>";
            $('#aTD6').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='amercury8'> புதன் / Mercury <br></span>";
            $('#aTD8').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='amercury12'> புதன் / Mercury <br></span>";
            $('#aTD12').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='amercury11'> புதன் / Mercury <br></span>";
            $('#aTD11').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='amercury10'> புதன் / Mercury <br></span>";
            $('#aTD10').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='amercury9'> புதன் / Mercury <br></span>";
            $('#aTD9').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='amercury7'> புதன் / Mercury <br></span>";
            $('#aTD7').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='amercury5'> புதன் / Mercury <br></span>";
            $('#aTD5').append(newRowContent);
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
        else{
            $('#amercury1').remove();$('#amercury2').remove();$('#amercury3').remove();$('#amercury4').remove();
            $('#amercury5').remove();$('#amercury6').remove();$('#amercury7').remove();$('#amercury8').remove();$('#amercury9').remove();$('#amercury10').remove();$('#amercury11').remove();$('#amercury12').remove();
        }
    });

    $('.amsam_jupiter').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='ajupiter1'> குரு / Jupiter <br></span>";
            $('#aTD1').append(newRowContent);
            $('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='ajupiter2'> குரு / Jupiter <br></span>";
            $('#aTD2').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='ajupiter3'> குரு / Jupiter <br></span>";
            $('#aTD3').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='ajupiter4'> குரு / Jupiter <br></span>";
            $('#aTD4').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='ajupiter6'> குரு / Jupiter <br></span>";
            $('#aTD6').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='ajupiter8'> குரு / Jupiter <br></span>";
            $('#aTD8').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='ajupiter12'> குரு / Jupiter <br></span>";
            $('#aTD12').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='ajupiter11'> குரு / Jupiter <br></span>";
            $('#aTD11').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='ajupiter10'> குரு / Jupiter <br></span>";
            $('#aTD10').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='ajupiter9'> குரு / Jupiter <br></span>";
            $('#aTD9').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='ajupiter7'> குரு / Jupiter <br></span>";
            $('#aTD7').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='ajupiter5'> குரு / Jupiter <br></span>";
            $('#aTD5').append(newRowContent);
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
        else{
            $('#ajupiter1').remove();$('#ajupiter2').remove();$('#ajupiter3').remove();$('#ajupiter4').remove();
            $('#ajupiter5').remove();$('#ajupiter6').remove();$('#ajupiter7').remove();$('#ajupiter8').remove();$('#ajupiter9').remove();$('#ajupiter10').remove();$('#ajupiter11').remove();$('#ajupiter12').remove();
        }
    });

    $('.amsam_venus').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='avenus1'> சுக்ரன் / Venus <br></span>";
            $('#aTD1').append(newRowContent);
            $('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='avenus2'> சுக்ரன் / Venus <br></span>";
            $('#aTD2').append(newRowContent);
            $('#avenus1').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='avenus3'> சுக்ரன் / Venus <br></span>";
            $('#aTD3').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='avenus4'> சுக்ரன் / Venus <br></span>";
            $('#aTD4').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='avenus6'> சுக்ரன் / Venus <br></span>";
            $('#aTD6').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='avenus8'> சுக்ரன் / Venus <br></span>";
            $('#aTD8').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='avenus12'> சுக்ரன் / Venus <br></span>";
            $('#aTD12').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='avenus11'> சுக்ரன் / Venus <br></span>";
            $('#aTD11').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='avenus10'> சுக்ரன் / Venus <br></span>";
            $('#aTD10').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='avenus9'> சுக்ரன் / Venus <br></span>";
            $('#aTD9').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='avenus7'> சுக்ரன் / Venus <br></span>";
            $('#aTD7').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='avenus5'> சுக்ரன் / Venus <br></span>";
            $('#aTD5').append(newRowContent);
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
        else{
            $('#avenus1').remove();$('#avenus2').remove();$('#avenus3').remove();$('#avenus4').remove();
            $('#avenus5').remove();$('#avenus6').remove();$('#avenus7').remove();$('#avenus8').remove();$('#avenus9').remove();$('#avenus10').remove();$('#avenus11').remove();$('#avenus12').remove();
        }
    });

    $('.amsam_saturn').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='asaturn1'> சனி / Saturn <br></span>";
            $('#aTD1').append(newRowContent);
            $('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='asaturn2'> சனி / Saturn <br></span>";
            $('#aTD2').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='asaturn3'> சனி / Saturn <br></span>";
            $('#aTD3').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='asaturn4'> சனி / Saturn <br></span>";
            $('#aTD4').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='asaturn6'> சனி / Saturn <br></span>";
            $('#aTD6').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='asaturn8'> சனி / Saturn <br></span>";
            $('#aTD8').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='asaturn12'> சனி / Saturn <br></span>";
            $('#aTD12').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='asaturn11'> சனி / Saturn <br></span>";
            $('#aTD11').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='asaturn10'> சனி / Saturn <br></span>";
            $('#aTD10').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='asaturn9'> சனி / Saturn <br></span>";
            $('#aTD9').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='asaturn7'> சனி / Saturn <br></span>";
            $('#aTD7').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='asaturn5'> சனி / Saturn <br></span>";
            $('#aTD5').append(newRowContent);
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
        else{
            $('#asaturn1').remove();$('#asaturn2').remove();$('#asaturn3').remove();$('#asaturn4').remove();
            $('#asaturn5').remove();$('#asaturn6').remove();$('#asaturn7').remove();$('#asaturn8').remove();$('#asaturn9').remove();$('#asaturn10').remove();$('#asaturn11').remove();$('#asaturn12').remove();
        }
    });

    $('.amsam_raagu').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='araagu1'> ராகு / Raagu <br></span>";
            $('#aTD1').append(newRowContent);
            $('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='araagu2'> ராகு / Raagu <br></span>";
            $('#aTD2').append(newRowContent);
            $('#araagu1').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='araagu3'> ராகு / Raagu <br></span>";
            $('#aTD3').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='araagu4'> ராகு / Raagu <br></span>";
            $('#aTD4').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='araagu6'> ராகு / Raagu <br></span>";
            $('#aTD6').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='araagu8'> ராகு / Raagu <br></span>";
            $('#aTD8').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='araagu12'> ராகு / Raagu <br></span>";
            $('#aTD12').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='araagu11'> ராகு / Raagu <br></span>";
            $('#aTD11').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='araagu10'> ராகு / Raagu <br></span>";
            $('#aTD10').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='araagu9'> ராகு / Raagu <br></span>";
            $('#aTD9').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='araagu7'> ராகு / Raagu <br></span>";
            $('#aTD7').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='araagu5'> ராகு / Raagu <br></span>";
            $('#aTD5').append(newRowContent);
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
        else{
            $('#araagu1').remove();$('#araagu2').remove();$('#araagu3').remove();$('#araagu4').remove();
            $('#araagu5').remove();$('#araagu6').remove();$('#araagu7').remove();$('#araagu8').remove();$('#araagu9').remove();$('#araagu10').remove();$('#araagu11').remove();$('#araagu12').remove();
        }
    });

    $('.amsam_kethu').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='akethu1'> கேது / Kethu <br></span>";
            $('#aTD1').append(newRowContent);
            $('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='akethu2'> கேது / Kethu <br></span>";
            $('#aTD2').append(newRowContent);
            $('#akethu1').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='akethu3'> கேது / Kethu <br></span>";
            $('#aTD3').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='akethu4'> கேது / Kethu <br></span>";
            $('#aTD4').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='akethu6'> கேது / Kethu <br></span>";
            $('#aTD6').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='akethu8'> கேது / Kethu <br></span>";
            $('#aTD8').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='akethu12'> கேது / Kethu <br></span>";
            $('#aTD12').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='akethu11'> கேது / Kethu <br></span>";
            $('#aTD11').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='akethu10'> கேது / Kethu <br></span>";
            $('#aTD10').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='akethu9'> கேது / Kethu <br></span>";
            $('#aTD9').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='akethu7'> கேது / Kethu <br></span>";
            $('#aTD7').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='akethu5'> கேது / Kethu <br></span>";
            $('#aTD5').append(newRowContent);
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
        else{
            $('#akethu1').remove();$('#akethu2').remove();$('#akethu3').remove();$('#akethu4').remove();
            $('#akethu5').remove();$('#akethu6').remove();$('#akethu7').remove();$('#akethu8').remove();$('#akethu9').remove();$('#akethu10').remove();$('#akethu11').remove();$('#akethu12').remove();
        }
    });

    $('.amsam_lagna').on('change',function(){
        var val = ($(this).val());
        if(val == 1){
            var newRowContent = "<span id='alagna1'> லக்கனம் / Lagna <br></span>";
            $('#aTD1').append(newRowContent);
            $('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 2){
            var newRowContent = "<span id='alagna2'> லக்கனம் / Lagna <br></span>";
            $('#aTD2').append(newRowContent);
            $('#alagna1').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 3){
            var newRowContent = "<span id='alagna3'> லக்கனம் / Lagna <br></span>";
            $('#aTD3').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 4){
            var newRowContent = "<span id='alagna4'> லக்கனம் / Lagna <br></span>";
            $('#aTD4').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 5){
            var newRowContent = "<span id='alagna6'> லக்கனம் / Lagna <br></span>";
            $('#aTD6').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 6){
            var newRowContent = "<span id='alagna8'> லக்கனம் / Lagna <br></span>";
            $('#aTD8').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 7){
            var newRowContent = "<span id='alagna12'> லக்கனம் / Lagna <br></span>";
            $('#aTD12').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();
        }
        else if(val == 8){
            var newRowContent = "<span id='alagna11'> லக்கனம் / Lagna <br></span>";
            $('#aTD11').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna12').remove();
        }
        else if(val == 9){
            var newRowContent = "<span id='alagna10'> லக்கனம் / Lagna <br></span>";
            $('#aTD10').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 10){
            var newRowContent = "<span id='alagna9'> லக்கனம் / Lagna <br></span>";
            $('#aTD9').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 11){
            var newRowContent = "<span id='alagna7'> லக்கனம் / Lagna <br></span>";
            $('#aTD7').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else if(val == 12){
            var newRowContent = "<span id='alagna5'> லக்கனம் / Lagna <br></span>";
            $('#aTD5').append(newRowContent);
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
        else{
            $('#alagna1').remove();$('#alagna2').remove();$('#alagna3').remove();$('#alagna4').remove();
            $('#alagna5').remove();$('#alagna6').remove();$('#alagna7').remove();$('#alagna8').remove();$('#alagna9').remove();$('#alagna10').remove();$('#alagna11').remove();$('#alagna12').remove();
        }
    });

    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>
@endsection