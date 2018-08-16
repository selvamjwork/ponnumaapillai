@extends('admin.layout.home')

@section('head')
{!! Charts::assets() !!}
@endsection

@section('title') Admin Day Report @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ponnu Maapillai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Admin Day Report </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Admin Day Report</h3>
                        </div>
                        <div class="card-body">
                            <form class="was-validated" action="{!! url('/admin/dashboard/adminwisecastereport') !!}">
                                <div class="form-group row mr-3 ml-3">
                                    <div class="col-md-6">
                                        <label for="dateform" class="control-label">Admin</label>
                                        <div class="input-group">
                                            <select required name="admin" class="form-control select2">
                                                <option value="">Select Admin</option>
                                                @foreach($subadmin as $value)
                                                <option value="{!! $value->id !!}">{!! $value->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="dateform" class="control-label">Month</label>
                                        <div class="input-group">
                                            <select required name="month" class="form-control select2">
                                                <option value="">Select Month</option>
                                                @foreach($monthList as $value)
                                                <option value="{!! $value->id !!}">{!! $value->month_name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row ">
                                    <div class="offset-xl-5 col-xl-1 offset-lg-5 col-lg-1 col-md-1 offset-md-5 offset-sm-5 col-sm-1 offset-4 col-2">
                                        <button type="submit" class="btn btn-warning">View Report</button>
                                    </div>
                                </div>
                                <hr>
                            </form>
                            @if(!empty($requestAll) ||!empty($caste) || !empty($month_details) || !empty($month))
                            <table class="table table-responsive text-center table-bordered mt-3">
                                <tbody>
                                    <tr>
                                        <th>Date</th>
                                        @foreach($caste as $cs)
                                        <th>{!! $cs->caste_name !!}</th>
                                        @endforeach
                                    </tr>
                                    @for($i=0;$i<$month_details["days_count"];$i++)
                                        <tr>
                                            <?php $date=str_pad(($i+1),2,0,STR_PAD_LEFT)."/".str_pad($month_details["month"],2,0,STR_PAD_LEFT)."/".date("Y")?>
                                            <td>{{$date}}</td>
                                            @foreach($caste as $cs)
                                                @if(array_key_exists($cs->id,$month))
                                                <!-- <?php $dateExist =  array_search($date, array_column($month[$cs->id], 'created_date')); ?> -->
                                                    @if($dateExist!==false &&   $month[$cs->id][$dateExist]['created_date']==$date))
                                                        <td>{{ $month[$cs->id][$dateExist]['count'] }}</td>
                                                    @else
                                                        <td>0</td>
                                                    @endif
                                                @else
                                                    <td>0</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection