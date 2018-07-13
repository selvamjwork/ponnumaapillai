@extends('layouts.app')

@section('page_name') Search @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai - Search </h1>
                </div>
                @if(Session::has('success'))
					<div class="col-sm-6">
						<div class="alert alert-success"> {{Session::get('success')}} </div> 
					</div>
				@endif
				@if(Session::has('message')) 
					<div class="col-sm-6">
						<div class="alert alert-info"> {{Session::get('message')}} </div> 
					</div>
				@endif
				@if(Session::has('error'))
					<div class="col-sm-6">
						<div class="alert alert-danger"> {{Session::get('error')}} </div> 
					</div>
				@endif
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        <form class="was-validated" method="get" action="{{url('profile/search')}}">
                            <label for="caste" class="control-label mr-3 ml-3">Degree</label>
                            <div class="form-group row mr-3 ml-3">
                            	@foreach($graduate as $graduate)
                                <div class="col-md-4">
                                    <label class="checkbox-inline ml-3">
                                        <input id="{{$graduate->id}}" name="graduate[]" type="checkbox" value="{{$graduate->id}}"><a class="ml-3">{{$graduate->graduate_name}}</a>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group row mr-3 ml-3">
                                <div class="col-md-6">
                                    <label for="caste" class="control-label">Caste</label>
                                    <select class="form-control" id="caste" name="caste" required>
				            			<option value="">-Select Caste-</option>
				            			<option value="all">All Caste</option>
				            			@foreach($caste as $caste)
				            			<option value="{{$caste->id}}">{{$caste->caste_name}}</option>
				            			@endforeach
				            		</select>
                                </div>
                                <div class="col-md-3">
                                    <label for="ageform" class="control-label">Age Form</label>
                                    <select class="form-control" id="ageform" name="ageform" required>
                                        <option value="">-Age From-</option>
                                        <option value="18"> 18 </option>
                                        <option value="19"> 19 </option>
                                        <option value="20"> 20 </option>
                                        <option value="21"> 21 </option>
                                        <option value="22"> 22 </option>
                                        <option value="23"> 23 </option>
                                        <option value="24"> 24 </option>
                                        <option value="25"> 25 </option>
                                        <option value="26"> 26 </option>
                                        <option value="27"> 27 </option>
                                        <option value="28"> 28 </option>
                                        <option value="29"> 29 </option>
                                        <option value="30"> 30 </option>
                                        <option value="31"> 31 </option>
                                        <option value="32"> 32 </option>
                                        <option value="33"> 33 </option>
                                        <option value="34"> 34 </option>
                                        <option value="35"> 35 </option>
                                        <option value="36"> 36 </option>
                                        <option value="37"> 37 </option>
                                        <option value="38"> 38 </option>
                                        <option value="39"> 39 </option>
                                        <option value="40"> 40 </option>
                                        <option value="41"> 41 </option>
                                        <option value="42"> 42 </option>
                                        <option value="43"> 43 </option>
                                        <option value="44"> 44 </option>
                                        <option value="45"> 45 </option>
                                        <option value="46"> 46 </option>
                                        <option value="47"> 47 </option>
                                        <option value="48"> 48 </option>
                                        <option value="49"> 49 </option>
                                        <option value="50"> 50 </option>
                                        <option value="51"> 51 </option>
                                        <option value="52"> 52 </option>
                                        <option value="53"> 53 </option>
                                        <option value="54"> 54 </option>
                                        <option value="55"> 55 </option>
                                        <option value="56"> 56 </option>
                                        <option value="57"> 57 </option>
                                        <option value="58"> 58 </option>
                                        <option value="59"> 59 </option>
                                        <option value="60"> 60 </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="ageto" class="control-label">Age To</label>
                                    <select class="form-control" id="ageto" name="ageto" required>
                                        <option value="">-Age To-</option>
                                        <option value="19"> 19 </option>
                                        <option value="20"> 20 </option>
                                        <option value="21"> 21 </option>
                                        <option value="22"> 22 </option>
                                        <option value="23"> 23 </option>
                                        <option value="24"> 24 </option>
                                        <option value="25"> 25 </option>
                                        <option value="26"> 26 </option>
                                        <option value="27"> 27 </option>
                                        <option value="28"> 28 </option>
                                        <option value="29"> 29 </option>
                                        <option value="30"> 30 </option>
                                        <option value="31"> 31 </option>
                                        <option value="32"> 32 </option>
                                        <option value="33"> 33 </option>
                                        <option value="34"> 34 </option>
                                        <option value="35"> 35 </option>
                                        <option value="36"> 36 </option>
                                        <option value="37"> 37 </option>
                                        <option value="38"> 38 </option>
                                        <option value="39"> 39 </option>
                                        <option value="40"> 40 </option>
                                        <option value="41"> 41 </option>
                                        <option value="42"> 42 </option>
                                        <option value="43"> 43 </option>
                                        <option value="44"> 44 </option>
                                        <option value="45"> 45 </option>
                                        <option value="46"> 46 </option>
                                        <option value="47"> 47 </option>
                                        <option value="48"> 48 </option>
                                        <option value="49"> 49 </option>
                                        <option value="50"> 50 </option>
                                        <option value="51"> 51 </option>
                                        <option value="52"> 52 </option>
                                        <option value="53"> 53 </option>
                                        <option value="54"> 54 </option>
                                        <option value="55"> 55 </option>
                                        <option value="56"> 56 </option>
                                        <option value="57"> 57 </option>
                                        <option value="58"> 58 </option>
                                        <option value="59"> 59 </option>
                                        <option value="60"> 60 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                    <button type="submit" class="btn btn-danger">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
	$(function() {
	    $('.multiselect-ui').multiselect({
	        includeSelectAllOption: true
	    });
	});
@endsection