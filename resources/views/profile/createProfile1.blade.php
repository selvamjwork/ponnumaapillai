@extends('layouts.payment')

@section('page_name') Profile  @endsection

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

@section('heading') <div style="font-size: 16px" class="panel-heading text-center text-danger">Registration&nbsp;&nbsp;<i class="fa fa-arrow-right">&nbsp;&nbsp;<b>Create Profile</b> &nbsp;&nbsp;</i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Payment Confirmation&nbsp;&nbsp; </i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Search Profile</i></div> @endsection

@section('content') @if(Session::has('message'))
    <div class="alert alert-info"> {{Session::get('message')}} </div> 
@endif 
<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <div class="form-top">
            <div class="form-top-left">
                <h3 class="text-center"><strong>Step 1 / 3</strong></h3>
                <p class="text-center"><strong>Personal Details - சொந்த விவரங்கள்</strong></p>
            </div>
        </div>
        {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/user/create-profile1'],'role'=>'form','class' => 'was-validated','files' => true ]) !!}
        <div class="form-bottom">
            <div class="form-group row{{ $errors->has('name') ? 'has-error' : ''}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('name', 'Name (பெயர்)', ['class' => 'control-label']) !!} {!! Form::text('name', null, ['readonly','required' => 'required','placeholder'=>'Name (பெயர்)','class' => 'form-control']) !!} {!! $errors->first('name', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('mobile') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span>{!! Form::label('mobile', 'Mobile Number (கைபேசி எண்)', ['class' => 'control-label']) !!} {!! Form::number('mobile', null, ['required' => 'required','placeholder'=>'Mobile Number (கைபேசி எண்)','class' => 'form-control']) !!} {!! $errors->first('mobile', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('email') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('email', 'Email Address (மின்னஞ்சல் முகவரி)', ['class' => 'control-label']) !!} {!! Form::email('email', null, ['placeholder'=>'Email Address (மின்னஞ்சல் முகவரி)','class' => 'form-control']) !!} {!! $errors->first('email', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('graduate') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('graduate', 'Degree (பட்டம்)', ['class' => 'control-label']) !!} {!! Form::select('graduate', $graduateArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Degree (பட்டம்)-']) !!} {!! $errors->first('graduate', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('professional') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('professional', 'Profession (தொழில்முறை)', ['class' => 'control-label']) !!} {!! Form::select('professional', $professionalArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Profession (தொழில்முறை)-']) !!} {!! $errors->first('professional', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('mother_tongue') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('mother_tongue', 'Mother Tongue (தாய் மொழி)', ['class' => 'control-label']) !!} {!! Form::select('mother_tongue', $mothers_tongueArray, null, ['required' => 'required','class' => 'form-control','placeholder'=>'-Select Mother Tongue (தாய் மொழி)-']) !!} {!! $errors->first('mother_tongue', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('height') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('height', 'Height (உயரம்) in CM', ['class' => 'control-label']) !!}
                    <!-- {!! Form::number('height', null, ['placeholder'=>'Height (உயரம்) in CM','class' => 'form-control']) !!} -->
                    <input type="text" name="height" onkeyup="checkInput(this)" / maxlength="3" placeholder="Height (உயரம்) in CM" required value="<?php echo $user->height; ?>" class="form-control"> {!! $errors->first('height', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('weight') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('weight', 'Weight (எடை) in KG', ['class' => 'control-label']) !!}
                    <!-- {!! Form::number('weight', null, ['placeholder'=>'Weight (எடை) in KG','class' => 'form-control']) !!} -->
                    <input type="text" name="weight" onkeyup="checkInput(this)" / maxlength="3" required placeholder="Weight (எடை) in KG" value="<?php 
                            echo $user->weight; ?>" class="form-control"> {!! $errors->first('weight', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('qualification') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('qualification', 'Qualification (கல்வி தகுதி)', ['class' => 'control-label']) !!} {!! Form::text('qualification', null, ['required' => 'required','placeholder'=>'Qualification (கல்வி தகுதி)','class' => 'form-control']) !!} {!! $errors->first('qualification', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('annual_income') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('annual_income', 'Monthly Income (மாதாந்திர வருமானம்)', ['class' => 'control-label']) !!} {!! Form::text('annual_income', null, ['required' => 'required','placeholder'=>'Monthly Income (மாதாந்திர வருமானம்)','class' => 'form-control']) !!} {!! $errors->first('annual_income', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row{{ $errors->has('religion') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('religion', 'Religion (மதம்)', ['class' => 'control-label']) !!} {!! Form::text('religion', null, ['required' => 'required','placeholder'=>'Religion (மதம்)','class' => 'form-control']) !!} {!! $errors->first('religion', '
                    <p class="help-block">:message</p>') !!}
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
            <div class="form-group row{{ $errors->has('gothram') ? 'has-error' : ''}}">
                <div class="col-md-12">
                    {!! Form::label('gothram', 'SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)', ['class' => 'control-label']) !!} {!! Form::text('gothram', null, ['placeholder'=>'SubCaste/Kulam/Gothram ( துணை சாதி/குலம் / கோத்ரம்)','class' => 'form-control']) !!} {!! $errors->first('gothram', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                    <button type="submit" class="pull-right btn btn-primary">Save and Continue</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!} 
    </div>
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
</script>
@endsection