@extends('layouts.app')

@section('content')
<div class="panel-heading">Profile View</div>
<div class="glass-panal-default">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-12">
        	<div class="continer">
                <table width="97%" border="0" align="center" cellpadding="5" cellspacing="5" style="border-bottom: 2px solid #73258B;">
        
                    <tbody>
                        <tr>
                            <td colspan="4" style="background-color: #73258B;color: white;FONT-SIZE: 22px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: bold; text-align:center">Basic Information</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td width="25%" style="color:#039;"><strong>Name</strong> </td>
                            <td width="25%" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">: {{$user->name}} </td>
                            <td width="25%" style="color:#039;"><strong> :</strong> </td>
                            <td width="25%">Male</td>
                        </tr>

                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Date of Birth :</strong> </td>
                            <td style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">{{$user->day}}-{{$user->month}}-{{$user->year}} </td>
                            <td style="color:#039;"><strong>Age  :</strong> </td>
                            <td>23 Years</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Marital Status : </strong></td>
                            <td>Divorcee</td>
                            <td style="color:#039;"><strong>Children Living Status : </strong></td>
                            <td>0</td>
                        </tr>
                        
                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Email :</strong> </td>
                            <td>admin@scubez.in</td>
                            <td style="color:#039;"><strong>Mother Tongue :</strong> </td>
                            <td></td>
                        </tr>
                        
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Profile Created By  : </strong></td>
                            <td>Self</td>
                            <td style="color:#039;"><strong>Reference By  :</strong> </td>
                            <td>Others</td>
                        </tr>
                    </tbody>
                </table>

                <table width="97%" border="0" align="center" cellpadding="5" cellspacing="5" style="border-bottom: 2px solid #73258B;">
        
                    <tbody>
                        <tr>
                            <td colspan="4" style="background-color: #73258B;color: white;FONT-SIZE: 22px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: bold; text-align:center">Basic Information</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td width="25%" style="color:#039;"><strong>Name</strong> </td>
                            <td width="25%" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">: {{$user->name}} </td>
                            <td width="25%" style="color:#039;"><strong>Gender :</strong> </td>
                            <td width="25%">Male</td>
                        </tr>

                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Date of Birth :</strong> </td>
                            <td style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">{{$user->day}}-{{$user->month}}-{{$user->year}} </td>
                            <td style="color:#039;"><strong>Age  :</strong> </td>
                            <td>23 Years</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Marital Status : </strong></td>
                            <td>Divorcee</td>
                            <td style="color:#039;"><strong>Children Living Status : </strong></td>
                            <td>0</td>
                        </tr>
                        
                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Email :</strong> </td>
                            <td>admin@scubez.in</td>
                            <td style="color:#039;"><strong>Mother Tongue :</strong> </td>
                            <td></td>
                        </tr>
                        
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Profile Created By  : </strong></td>
                            <td>Self</td>
                            <td style="color:#039;"><strong>Reference By  :</strong> </td>
                            <td>Others</td>
                        </tr>
                    </tbody>
                </table>

                <table width="97%" border="0" align="center" cellpadding="5" cellspacing="5">
        
                    <tbody>
                        <tr>
                            <td colspan="4" style="background-color: #73258B;color: white;FONT-SIZE: 22px;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: bold; text-align:center">Basic Information</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td width="25%" style="color:#039;"><strong>Name</strong> </td>
                            <td width="25%" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">: {{$user->name}} </td>
                            <td width="25%" style="color:#039;"><strong>Gender :</strong> </td>
                            <td width="25%">Male</td>
                        </tr>

                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Date of Birth :</strong> </td>
                            <td style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">{{$user->day}}-{{$user->month}}-{{$user->year}} </td>
                            <td style="color:#039;"><strong>Age  :</strong> </td>
                            <td>23 Years</td>
                        </tr>
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Marital Status : </strong></td>
                            <td>Divorcee</td>
                            <td style="color:#039;"><strong>Children Living Status : </strong></td>
                            <td>0</td>
                        </tr>
                        
                        <tr bgcolor="#ffffff">
                            <td style="color:#039;"><strong>Email :</strong> </td>
                            <td>admin@scubez.in</td>
                            <td style="color:#039;"><strong>Mother Tongue :</strong> </td>
                            <td></td>
                        </tr>
                        
                        <tr bgcolor="#f1f1f1">
                            <td style="color:#039;"><strong>Profile Created By  : </strong></td>
                            <td>Self</td>
                            <td style="color:#039;"><strong>Reference By  :</strong> </td>
                            <td>Others</td>
                        </tr>
                    </tbody>
                </table>

                <h4>Mother's Name</h1>
                <h4>Mother's Occupation</h1>
                <h4>Gender</h1>
                <h4>Date of Birth</h1>
                <h4>Qulafication</h1>
                <h4>Annual Income</h1>
                <h4>Mother's Tongue</h1>
                <h4>Religion</h1>
                <h4>caste</h1>
                <h4>subcaste</h1>
                <h4>Moonsign</h1>
                <h4>Star</h1>
                <h4>Email Id</h1>
                <h4>Mobile Number</h1>
                <h4>Address 1</h1>
                <h4>Address 2</h1>
        	</div>
        </div>
        <div class="col-md-6">
        	<div class="continer">
                <h4>: {{$user->mothers_name}}</h1>
                <h4>: {{$user->mothers_occupation}}</h1>
                <h4>: {{$user->gender}}</h1>
                <h4>: 02-03-1996</h1>
                <h4>: {{$user->qualification}}</h1>
                <h4>: {{$user->annual_income}}</h1>
                <h4>: {{$user->mothers_tongue}}</h1>
                <h4>: {{$user->religion}}</h1>
                <h4>: {{$user->caste}}</h1>
                <h4>: {{$user->subcaste}}</h1>
                <h4>: {{$user->rasi}}</h1>
                <h4>: {{$user->star}}</h1>
                <h4>: {{$user->email}}</h1>
                <h4>: {{$user->mobile}}</h1>
                <h4>: {{$user->address1}}</h1>
                <h4>: {{$user->address2}}</h1>
        	</div>
        </div>
    </div>
</div>
@endsection