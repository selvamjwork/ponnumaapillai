@extends('layouts.guest')

@section('page_name') Forgot Password  @endsection

@section('content')

@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif

<div class="card offset-xl-2 col-xl-8 border border-danger rounded mb-5">
    <div class="card-header bg-white mt-2">
        <form class="was-validated" role="form" method="POST" action="{{ url('/password/mobile') }}">
            {{ csrf_field() }}

            <div class="form-group row{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">Mobile No</label>

                <div class="col-md-6">
                    <input id="mobile" type="mobile" class="form-control" placeholder="Enter Your Mobile Number" name="mobile" value="{{ old('mobile') }}" required  onblur="javascript:document.resetcode.mobile_number.value=this.value;">

                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                    <button type="submit" class="btn btn-success">Send code</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection