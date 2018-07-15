@extends('layouts.app')
@section('page_name') My Profile @endsection
@section('content')

<div class="content-wrapper invoice">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Welcome to Ponnu Maapillai</h1>
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
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                @if(Auth::user()->profile_completed ==1)
                <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i> <a href="{{ url('/user/update-profile1')}}" class="text-danger">Edit Profile</a></li>
                @endif
                </ol>
              </div>
          </div>
      </div>
  </div>
  @foreach($user as $users)
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-9 offset-md-2">
                  <div class="card card-danger">
                      <div class="card-header">
                          <h3 class="card-title">Personal Details - சொந்த விவரங்கள்</h3>
                      </div>
                      <div class="card-body">
                          <ul class="list-group list-group-unbordered mb-3">
                              <div class="row">
                                  <div class="col-md-4 text-center">
                                      <div class="widget-user-header">
                                          <div class="widget-user-image">
                                              <div>
                                                  <a href="/images/uploads/profile_pic/{{$users->profile_pic}}">           
                                                    <img class="img-bordered elevation-1  mb-3" src="/images/uploads/profile_pic/{{$users->profile_pic}}" height="200px" width="200px" alt="{{$users->name}}">
                                                  </a>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <ul class="list-group list-group-unbordered mb-3">
                                          <li class="list-group-item">
                                              <b>Matri ID</b> <a class="float-right">{{ $users->user_id }}</a>
                                          </li>
                                          <li class="list-group-item">
                                              <b>Profile Created</b> <a class="float-right">{{$users->created_at->day}}-{{$users->created_at->month}}-{{$users->created_at->year}}</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Name</strong> <a class="float-right">{{ $users->name }}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Gender</strong> <a class="float-right">@if($users->gender == 1)
                        Male
                        @else
                        Female
                        @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Date of Birth</strong> <a class="float-right">{{$users->day}}-{{$users->month}}-{{$users->year}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Age</strong> <a class="float-right">{{$users->age}} Years</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Qualification</strong> <a class="float-right">{{$users->qualification}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Height</strong> <a class="float-right">{{$users->height}} cm</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Graduate</strong> <a class="float-right">{{$graduate->graduate_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Weight</strong> <a class="float-right">{{$users->weight}} kg</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Profession</strong> <a class="float-right">{{$professional->professional_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mother Tongue</strong> <a class="float-right">{{$mother_tongue->language_name}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Monthly Income</strong> <a class="float-right">{{$users->annual_income}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Religion</strong> <a class="float-right">{{$users->religion}}</a> </li>
                                  </div>
                              </div>
                          </ul>
                      </div>
                  </div>
                  <div class="card card-danger">
                      <div class="card-header">
                          <h3 class="card-title">Family Details - குடும்ப விவரங்கள்</h3>
                      </div>
                      <div class="card-body">
                          <ul class="list-group list-group-unbordered mb-3">
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Father's Name</strong> <a class="float-right">Mr.{{$users->fathers_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Father's Occupation</strong> <a class="float-right">@if(empty($users->fathers_occupation==''))
                          {{$users->fathers_occupation}}
                        @else
                        Null
                        @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mother's Name</strong> <a class="float-right">Mrs.{{$users->mothers_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mother's Occupation</strong> <a class="float-right">@if(empty($users->mothers_occupation==''))
                        {{$users->mothers_occupation}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Brothers</strong> <a class="float-right">{{$users->noofbrothers}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Brothers Married</strong> <a class="float-right">{{$users->noofbrothersstatus}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Sisters</strong> <a class="float-right">{{$users->noofsisters}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Sisters Married</strong> <a class="float-right">{{$users->noofsistersstatus}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Caste</strong> <a class="float-right">{{$caste->caste_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Subsect</strong> <a class="float-right">{{$subcaste->subcaste_name}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 pb-1">
                                      <li class="list-group-item"> <strong>SubCaste/Kulam/Gothram</strong> <a class="float-right">@if(empty($users->gothram==''))
                        {{$users->gothram}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 pb-1">
                                      <li class="list-group-item"> <strong>About Youself:</strong>
                                          <p>{{$users->aboutyourself}}</p>
                                      </li>
                                  </div>

                              </div>
                          </ul>
                      </div>
                  </div>

                  <div class="card card-danger">
                      <div class="card-header">
                          <h3 class="card-title">Birth Details - பிறப்பு விவரங்கள்</h3>
                      </div>
                      <div class="card-body">
                          <ul class="list-group list-group-unbordered mb-3">
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Place of Birth</strong> <a class="float-right">@if(empty($users->pob==''))
                        {{$users->pob}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Time Of Birth</strong> <a class="float-right">{{$users->hour}}:{{$users->minutes}}:{{$users->seconds}} {{$users->session}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Moonsign </strong> <a class="float-right">{{$moonsign->rasi_name}} </a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Star </strong> <a class="float-right">{{$star->star_name}} </a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Dasa Type</strong> <a class="float-right">{{$dosatype->dosatype_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Dosham</strong> <a class="float-right">{{$dosham->dosham_name}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                              @foreach($horoscope as $value)
                                <div class="col-md-6 pb-1">
                                    <li class="list-group-item">
                                        <table width="auto" border="0" align="center" cellPadding="3" cellSpacing="0" bordercolor="#f56954">
                                            <tbody>
                                                <tr>
                                                    <td valign="top">
                                                        <table border="1" cellPadding="5" cellSpacing="1" bordercolor="#f56954">
                                                            <tdbody>
                                                                <tr>
                                                                    <td id="rTD1" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 1)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 1)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 1)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 1)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 1)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 1)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 1)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 1)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 1)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 1)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD2" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 2)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 2)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 2)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 2)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 2)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 2)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 2)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 2)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 2)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 2)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD3" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 3)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 3)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 3)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 3)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 3)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 3)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 3)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 3)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 3)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 3)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD4" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 4)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 4)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 4)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 4)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 4)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 4)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 4)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 4)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 4)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 4)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD5" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 12)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 12)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 12)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 12)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 12)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 12)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 12)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 12)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 12)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 12)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td align="middle" colSpan="2" rowSpan="2">
                                                                        <div align="center">
                                                                            <font size="3"><b>RASI</b></font>
                                                                        </div>
                                                                    </td>
                                                                    <td id="rTD6" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 5)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 5)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 5)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 5)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 5)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 5)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 5)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 5)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 5)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 5)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD7" align="middle" width="80" height="80">@if($value->raasi_sun == 11)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 11)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 11)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 11)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 11)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 11)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 11)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 11)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 11)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 11)
                                                                      ல
                                                                      @endif</td>
                                                                    <td id="rTD8" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 6)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 6)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 6)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 6)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 6)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 6)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 6)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 6)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 6)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 6)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD9" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 10)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 10)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 10)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 10)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 10)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 10)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 10)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 10)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 10)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 10)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD10" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 9)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 9)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 9)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 9)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 9)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 9)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 9)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 9)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 9)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 9)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD11" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 8)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 8)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 8)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 8)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 8)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 8)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 8)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 8)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 8)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 8)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD12" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 7)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->raasi_moon == 7)
                                                                      ச
                                                                      @endif
                                                                      @if($value->raasi_mars == 7)
                                                                      செ
                                                                      @endif
                                                                      @if($value->raasi_mercury == 7)
                                                                      பு
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 7)
                                                                      கு
                                                                      @endif
                                                                      @if($value->raasi_venus == 7)
                                                                      சு
                                                                      @endif
                                                                      @if($value->raasi_saturn == 7)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->raasi_raagu == 7)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->raasi_kethu == 7)
                                                                      கே
                                                                      @endif
                                                                      @if($value->raasi_lagna == 7)
                                                                      ல
                                                                      @endif</td>
                                                                </tr>
                                                            </tdbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <li class="list-group-item">
                                        <table bordercolor="#f56954" width="auto" border="0" align="center" cellPadding="3" cellSpacing="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="top">
                                                        <table border="1" cellPadding="5" cellSpacing="1" bordercolor="#f56954">
                                                            <tdbody>
                                                                <tr>
                                                                    <td id="aTD1" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 1)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 1)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 1)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 1)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 1)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 1)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 1)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 1)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 1)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 1)
                                                                      ல
                                                                      @endif</td>
                                                                    <td id="aTD2" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 2)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 2)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 2)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 2)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 2)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 2)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 2)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 2)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 2)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 2)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD3" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 3)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 3)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 3)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 3)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 3)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 3)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 3)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 3)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 3)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 3)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD4" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 4)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 4)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 4)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 4)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 4)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 4)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 4)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 4)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 4)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 4)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD5" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 12)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 12)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 12)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 12)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 12)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 12)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 12)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 12)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 12)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 12)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td align="middle" colSpan="2" rowSpan="2">
                                                                        <div align="center">
                                                                            <font size="3"><b>AMSAM</b></font>
                                                                        </div>
                                                                    </td>
                                                                    <td id="aTD6" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 5)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 5)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 5)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 5)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 5)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 5)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 5)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 5)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 5)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 5)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD7" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 11)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 11)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 11)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 11)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 11)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 11)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 11)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 11)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 11)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 11)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD8" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 6)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 6)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 6)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 6)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 6)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 6)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 6)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 6)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 6)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 6)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD9" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 10)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 10)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 10)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 10)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 10)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 10)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 10)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 10)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 10)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 10)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD10" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 9)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 9)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 9)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 9)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 9)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 9)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 9)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 9)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 9)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 9)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD11" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 8)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 8)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 8)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 8)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 8)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 8)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 8)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 8)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 8)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 8)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD12" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 7)  
                                                                      சூ
                                                                      @endif
                                                                      @if($value->amsam_moon == 7)
                                                                      ச
                                                                      @endif
                                                                      @if($value->amsam_mars == 7)
                                                                      செ
                                                                      @endif
                                                                      @if($value->amsam_mercury == 7)
                                                                      பு
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 7)
                                                                      கு
                                                                      @endif
                                                                      @if($value->amsam_venus == 7)
                                                                      சு
                                                                      @endif
                                                                      @if($value->amsam_saturn == 7)
                                                                      சனி
                                                                      @endif
                                                                      @if($value->amsam_raagu == 7)
                                                                      ரா
                                                                      @endif
                                                                      @if($value->amsam_kethu == 7)
                                                                      கே
                                                                      @endif
                                                                      @if($value->amsam_lagna == 7)
                                                                      ல
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                            </tdbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </div>
                              @endforeach
                            </div>
                          </ul>
                      </div>
                  </div>
                  <div class="card card-danger">
                      <div class="card-header">
                          <h3 class="card-title">Contact Details - தொடர்பு விபரங்கள்</h3>
                      </div>
                      <div class="card-body">
                          <ul class="list-group list-group-unbordered mb-3">
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mobile Number</strong> <a class="float-right">{{$users->mobile}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>E-Mail</strong> <a class="float-right">@if(empty($users->email==''))
                        {{$users->email}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 pb-1">
                                      <li class="list-group-item"> <strong>Address:</strong>
                                          <p>@if(empty($users->address==''))
                       {{$users->address}}
                      @else
                      Null
                      @endif</p>
                                      </li>
                                  </div>
                              </div>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  @endforeach
</div>
@endsection