@extends('layouts.payment')

@section('page_name') Profile  @endsection

@section('marquee')
<div class="container pt-5" id="marquee">
    <div class="row mt-5">
        @if(isset($scrollingmessage))
            @foreach($scrollingmessage as $message)
                <div class="col alert alert-warning">
                    <marquee class="text-danger" behavior="scroll" direction="left" scrollamount="8">
                        <h4>{{$message->scrolling_message}}</h4>
                    </marquee>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

@section('heading') <div style="font-size: 16px" class="panel-heading text-center text-danger">Registration&nbsp;&nbsp;<i class="fa fa-arrow-right">&nbsp;&nbsp;<b>Create Profile</b> &nbsp;&nbsp;</i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Payment Confirmation&nbsp;&nbsp; </i> <i class="fa fa-arrow-right">&nbsp;&nbsp;Search Profile</i></div> @endsection

@section('content')
        @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success')}} </div> 
        @endif
        @if(Session::has('message')) 
            <div class="alert alert-info"> {{Session::get('message')}} </div> 
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger"> {{Session::get('error')}} </div> 
        @endif
<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <div class="form-top">
            <div class="form-top-left">
                <h3 class="text-center"><strong>Step 2 / 3</strong></h3>
                <p class="text-center"><strong>Family Details - குடும்ப விவரங்கள்</strong></p>
            </div>
        </div>
        {!! Form::model($user, ['method' => 'PATCH', 'url' => ['/user/create-profile2'],'role'=>'form','class' => 'was-validated','files' => true ]) !!}
        <div class="form-bottom">
            <div class="form-group row{{ $errors->has('fathers_name') ? 'has-error' : ''}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('fathers_name', 'Fathers Name (தந்தையின் பெயர்)', ['class' => 'control-label']) !!}
                    {!! Form::text('fathers_name', null, ['required' => 'required','placeholder'=>'Fathers Name (தந்தையின் பெயர்)','class' => 'form-control']) !!}
                    {!! $errors->first('fathers_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('fathers_occupation', 'Fathers Occupation (தந்தையின் தொழில்)', ['class' => 'control-label']) !!}
                    {!! Form::text('fathers_occupation', null, ['placeholder'=>'Fathers Occupation (தந்தையின் தொழில்)','required' => 'required','class' => 'form-control']) !!}
                    {!! $errors->first('fathers_occupation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row{{ $errors->has('mothers_name') ? 'has-error' : ''}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('mothers_name', 'Mothers Name (அம்மாவின் பெயர்)', ['class' => 'control-label']) !!}
                    {!! Form::text('mothers_name', null, ['required' => 'required','placeholder'=>'Mothers Name (அம்மாவின் பெயர்)','class' => 'form-control']) !!}
                    {!! $errors->first('mothers_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('mothers_occupation', 'Mothers Occupation (அம்மாவின் தொழில்)', ['class' => 'control-label']) !!}
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
            <div class="form-group row{{ $errors->has('address') ? 'has-error' : ''}}">
                <div class="col-md-12">
                <span><i class="glyphicon glyphicon-asterisk text-danger"></i></span> {!! Form::label('address', 'Address (முகவரி)', ['class' => 'control-label']) !!}
                    {!! Form::textarea('address', null, ['required' => 'required','placeholder'=>'Address (முகவரி)','class' => 'form-control']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="row">
                <div class="offset-md-4 offset-lg-5 col-lg-3 offset-4 col-4 offset-xl-4">
                    <button type="submit" class="btn btn-success">Save and Continue</button>
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
</script>
@endsection