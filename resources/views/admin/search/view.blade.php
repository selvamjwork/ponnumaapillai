@extends('admin.layout.home')

@section('content')
<div class="container-fluid">  
    <div class="row-fluid">
      <div class="span12">  
        <div class="widget-box">
          <div class="span12">         
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="odd gradeX">
                        <td>{{$user->nameRange}}.{{$user->name}}</td>
                        @if($user->gender == 1)
                        <td>Male</td>
                        @else
                        <td>Female</td>
                        @endif
                        <td>{{$user->day}}-{{$user->month}}-{{$user->year}}</td>
                        <td>{{$user->age}} Years Old</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Time of Birth</th>
                        <th>Graduate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->hour}}:{{$user->minutes}}:{{$user->seconds}} {{$user->session}}</td>
                        <td>{{$user->graduate}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Father's Name</th>
                        <th>Father's Occupation</th>
                        <th>Mother's Name</th>
                        <th>Mother's Occupation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->namefrange}}.{{$user->fathers_name}}</td>
                        <td>{{$user->fathers_occupation}}</td>
                        <td>{{$user->namemrange}}.{{$user->mothers_name}}</td>
                        <td>{{$user->mothers_occupation}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>No Of Brothers</th>
                        <th>No Of Brothers Married</th>
                        <th>No Of Sisters</th>
                        <th>No Of Sisters Married</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->noofbrothers}}</td>
                        <td>{{$user->noofbrothersstatus}}</td>
                        <td>{{$user->noofsisters}}</td>
                        <td>{{$user->noofsistersstatus}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Qualification</th>
                        <th>Profession</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->height}} CM</td>
                        <td>{{$user->weight}} KG</td>
                        <td>{{$user->qualification}}</td>
                        <td>{{$user->professional}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Annual Income</th>
                        <th>Mother Tongue</th>
                        <th>Place of Birth</th>
                        <th>Religion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->annual_income}}</td>
                        <td>{{$user->mother_tongue}}</td>
                        <td>{{$user->pob}}</td>
                        <td>{{$user->religion}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Caste</th>
                        <th>Subsect</th>
                        <th>SubCaste/Kulam/Gothram</th>
                        <th>Moonsign</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->caste}}</td>
                        <td>{{$user->subsect}}</td>
                        <td>{{$user->gothram}}</td>
                        <td>{{$user->moonsign}}</td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Star</th>
                        <td>Address</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->star}}</td>
                        <td>{{$user->address}}</td>
                      </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection