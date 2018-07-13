@extends('layouts.app')

@section('content')
<div class="panel-heading">Search</div>
<div class="glass-panal-default">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        @foreach($user as $us)
            <div class="row">
                <div class="col-md-3">
                    <img class="img-responsive" style="height: 150px" src="/images/uploads/profile_pic/{{$us->profile_pic}}">
                </div>
                <div class="col-md-9">
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="4" style="background-color: #c32143;color: white;FONT-SIZE: 25px;font-weight: bold; text-align:left;"> {!! $us->user_id !!} - {{$us->nameRange}}.{!! $us->name !!}  <a style="color:#fff" class="pull-right btn" href="{{ url('/profile/search/' . $us->id) }}">View Profile</a></td>
                            </tr>
                            <tr bgcolor="#f1f1f1">
                                <td width="10%" style="color:#039;"><strong>Age</strong> </td>
                                <td width="40%">: {{$us->age}}</td>
                                <td width="10%" style="padding-right:  10px; color:#039;"><strong>Height</strong> </td>
                                <td width="40%">: {{$us->height}} CM</td>
                                
                            </tr>
                            <tr bgcolor="#fff">
                                <td width="10%" style="color:#039;"><strong>Religion</strong> </td>
                                <td width="40%">: {{$us->religion}}</td>
                                <td width="10%" style="padding-right:  10px; color:#039;"><strong>Caste</strong> </td>
                                <td width="40%">: {{ $us->caste}}</td>
                            </tr>
                            <tr bgcolor="#f1f1f1">
                                <td width="10%" style="color:#039;"><strong>Subcaste</strong></td>
                                <td width="40%">: {{ $us->subsect}}</td>
                                <td width="10%" style="padding-right:  10px; color:#039;"><strong>Star</strong> </td>
                                <td width="40%">: {{$us->star}}</td>
                            </tr>
                            <tr bgcolor="#fff">
                                <td width="10%" style="color:#039;"><strong>Education</strong> </td>
                                <td width="40%">: {{$us->qualification}}</td>
                                <td width="10%" style="padding-right:  10px; color:#039;"><strong>Profession</strong> </td>
                                <td width="40%">: {{$us->professional}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            @endforeach
            <div class="pagination-wrapper"> 
                {!! $user->appends(\Input::except('page'))->render() !!}  
            </div>
    </div>
</div>
@endsection