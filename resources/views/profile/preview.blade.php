@extends('layouts.payment')

@section('page_name') Profile Preview @endsection

@section('content')
<div>
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
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
                                                  <a href="/images/uploads/profile_pic/{{$user->profile_pic}}">           
                                                    <img class="img-bordered elevation-1  mb-3" src="/images/uploads/profile_pic/{{$user->profile_pic}}" height="200px" width="200px" alt="{{$user->name}}">
                                                  </a>
                                                </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <ul class="list-group list-group-unbordered mb-3">
                                          <li class="list-group-item">
                                              <b>Matri ID</b> <a class="float-right">{{ $user->user_id }}</a>
                                          </li>
                                          <li class="list-group-item">
                                              <b>Profile Created</b> <a class="float-right">{{$user->created_at->day}}-{{$user->created_at->month}}-{{$user->created_at->year}}</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Name</strong> <a class="float-right">{{ $user->name }}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Gender</strong> <a class="float-right">@if($user->gender == 1)
                        Male
                        @else
                        Female
                        @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Date of Birth</strong> <a class="float-right">{{$user->day}}-{{$user->month}}-{{$user->year}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Age</strong> <a class="float-right">{{$user->age}} Years</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Qualification</strong> <a class="float-right">{{$user->qualification}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Height</strong> <a class="float-right">{{$user->height}} cm</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Graduate</strong> <a class="float-right">{{$graduate->graduate_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Weight</strong> <a class="float-right">{{$user->weight}} kg</a> </li>
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
                                      <li class="list-group-item"> <strong>Monthly Income</strong> <a class="float-right">{{$user->annual_income}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Religion</strong> <a class="float-right">{{$user->religion}}</a> </li>
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
                                      <li class="list-group-item"> <strong>Father's Name</strong> <a class="float-right">Mr.{{$user->fathers_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Father's Occupation</strong> <a class="float-right">@if(empty($user->fathers_occupation==''))
                          {{$user->fathers_occupation}}
                        @else
                        Null
                        @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mother's Name</strong> <a class="float-right">Mrs.{{$user->mothers_name}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Mother's Occupation</strong> <a class="float-right">@if(empty($user->mothers_occupation==''))
                        {{$user->mothers_occupation}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Brothers</strong> <a class="float-right">{{$user->noofbrothers}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Brothers Married</strong> <a class="float-right">{{$user->noofbrothersstatus}}</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Sisters</strong> <a class="float-right">{{$user->noofsisters}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>No Of Sisters Married</strong> <a class="float-right">{{$user->noofsistersstatus}}</a> </li>
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
                                      <li class="list-group-item"> <strong>SubCaste/Kulam/Gothram</strong> <a class="float-right">@if(empty($user->gothram==''))
                        {{$user->gothram}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 pb-1">
                                      <li class="list-group-item"> <strong>About Youself:</strong>
                                          <p>{{$user->aboutyourself}}</p>
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
                                      <li class="list-group-item"> <strong>Place of Birth</strong> <a class="float-right">@if(empty($user->pob==''))
                        {{$user->pob}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Time Of Birth</strong> <a class="float-right">{{$user->hour}}:{{$user->minutes}}:{{$user->seconds}} {{$user->session}}</a> </li>
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
                                      <li class="list-group-item"> <strong>Dasa Type</strong> <a class="float-right">{{$star->dosatype}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>Dosham</strong> <a class="float-right">{{$star->dosham}}</a> </li>
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
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 1)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 1)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 1)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 1)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 1)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 1)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 1)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 1)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 1)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD2" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 2)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 2)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 2)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 2)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 2)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 2)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 2)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 2)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 2)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 2)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD3" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 3)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 3)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 3)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 3)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 3)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 3)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 3)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 3)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 3)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 3)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD4" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 4)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 4)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 4)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 4)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 4)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 4)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 4)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 4)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 4)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 4)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD5" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 12)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 12)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 12)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 12)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 12)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 12)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 12)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 12)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 12)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 12)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td align="middle" colSpan="2" rowSpan="2">
                                                                        <div align="center">
                                                                            <font size="3"><b>RASI</b></font>
                                                                        </div>
                                                                    </td>
                                                                    <td id="rTD6" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 5)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 5)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 5)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 5)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 5)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 5)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 5)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 5)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 5)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 5)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD7" align="middle" width="80" height="80">@if($value->raasi_sun == 11)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 11)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 11)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 11)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 11)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 11)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 11)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 11)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 11)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 11)
                                                                      லக்-La
                                                                      @endif</td>
                                                                    <td id="rTD8" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 6)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 6)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 6)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 6)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 6)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 6)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 6)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 6)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 6)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 6)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="rTD9" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 10)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 10)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 10)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 10)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 10)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 10)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 10)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 10)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 10)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 10)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD10" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 9)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 9)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 9)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 9)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 9)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 9)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 9)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 9)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 9)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 9)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD11" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 8)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 8)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 8)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 8)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 8)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 8)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 8)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 8)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 8)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 8)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="rTD12" align="middle" width="80" height="80">
                                                                      @if($value->raasi_sun == 7)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->raasi_moon == 7)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->raasi_mars == 7)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->raasi_mercury == 7)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->raasi_jupiter == 7)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->raasi_venus == 7)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->raasi_saturn == 7)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->raasi_raagu == 7)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->raasi_kethu == 7)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->raasi_lagna == 7)
                                                                      லக்-La
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
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 1)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 1)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 1)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 1)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 1)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 1)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 1)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 1)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 1)
                                                                      லக்-La
                                                                      @endif</td>
                                                                    <td id="aTD2" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 2)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 2)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 2)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 2)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 2)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 2)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 2)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 2)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 2)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 2)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD3" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 3)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 3)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 3)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 3)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 3)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 3)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 3)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 3)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 3)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 3)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD4" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 4)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 4)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 4)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 4)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 4)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 4)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 4)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 4)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 4)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 4)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD5" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 12)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 12)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 12)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 12)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 12)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 12)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 12)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 12)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 12)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 12)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td align="middle" colSpan="2" rowSpan="2">
                                                                        <div align="center">
                                                                            <font size="3"><b>AMSAM</b></font>
                                                                        </div>
                                                                    </td>
                                                                    <td id="aTD6" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 5)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 5)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 5)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 5)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 5)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 5)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 5)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 5)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 5)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 5)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD7" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 11)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 11)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 11)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 11)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 11)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 11)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 11)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 11)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 11)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 11)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD8" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 6)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 6)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 6)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 6)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 6)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 6)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 6)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 6)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 6)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 6)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="aTD9" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 10)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 10)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 10)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 10)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 10)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 10)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 10)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 10)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 10)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 10)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD10" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 9)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 9)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 9)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 9)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 9)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 9)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 9)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 9)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 9)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 9)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD11" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 8)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 8)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 8)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 8)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 8)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 8)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 8)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 8)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 8)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 8)
                                                                      லக்-La
                                                                      @endif
                                                                    </td>
                                                                    <td id="aTD12" align="middle" width="80" height="80">
                                                                      @if($value->amsam_sun == 7)  
                                                                      சூ-Su
                                                                      @endif
                                                                      @if($value->amsam_moon == 7)
                                                                      ச- Mo
                                                                      @endif
                                                                      @if($value->amsam_mars == 7)
                                                                      செ- Ma
                                                                      @endif
                                                                      @if($value->amsam_mercury == 7)
                                                                      பு-Me
                                                                      @endif
                                                                      @if($value->amsam_jupiter == 7)
                                                                      கு-Ju
                                                                      @endif
                                                                      @if($value->amsam_venus == 7)
                                                                      சு-Ve
                                                                      @endif
                                                                      @if($value->amsam_saturn == 7)
                                                                      சனி-Sa
                                                                      @endif
                                                                      @if($value->amsam_raagu == 7)
                                                                      ராகு-Ra
                                                                      @endif
                                                                      @if($value->amsam_kethu == 7)
                                                                      கேது-Kethu
                                                                      @endif
                                                                      @if($value->amsam_lagna == 7)
                                                                      லக்-La
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
                                      <li class="list-group-item"> <strong>Mobile Number</strong> <a class="float-right">{{$user->mobile}}</a> </li>
                                  </div>
                                  <div class="col-md-6 pb-1">
                                      <li class="list-group-item"> <strong>E-Mail</strong> <a class="float-right">@if(empty($user->email==''))
                        {{$user->email}}
                      @else
                      Null
                      @endif</a> </li>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 pb-1">
                                      <li class="list-group-item"> <strong>Address:</strong>
                                          <p>@if(empty($user->address==''))
                       {{$user->address}}
                      @else
                      Null
                      @endif</p>
                                      </li>
                                  </div>
                              </div>
                          </ul>
                          <form action="/user/create-form-preview" method="post" >
          <a class="pull-left btn btn-danger" href="/user/create-profile3"><< Previous</a>
          <button type="submit" class="pull-right btn btn-danger">Next >></button>
          {{ csrf_field() }}
      </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection