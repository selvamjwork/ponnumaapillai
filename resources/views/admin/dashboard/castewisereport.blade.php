@extends('admin.layout.home')

@section('head')
{!! Charts::assets() !!}
@endsection

@section('title') Admin Caste Report @endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ponnu Maapillai</h1>
                </div>
                <div class="col-sm-6">
                    
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
                            <h3 class="card-title">Admin Day Wise Caste Report</h3>
                        </div>
                        <div class="card-body">
                            
                                <div class="form-group row mr-3 ml-3">
                                    <!-- <div class="col-md-12">
                                        <label for="dateform" class="control-label">Date</label>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-default float-right" id="daterange-btn"><i class="fa fa-calendar mr-1"></i>Select Date<i class="fa fa-caret-down ml-1"></i> </button>
                                        </div>
                                    </div> -->
                                </div>
                                <form>
                                  <div class="row ">
                                      <div class="offset-xl-1 col-xl-1 col-lg-1 col-md-1  col-sm-1 col-2">
                                        <input type="submit" class="btn btn-success" Value="Today" name="today">
                                      </div>
                                      <div class="offset-xl-1 col-xl-1 col-lg-1 col-md-1  col-sm-1 col-2">
                                        <input type="submit" class="btn btn-success" Value="Onemonth" name="onemonth">
                                      </div>
                                  </div>
                                </form>
                                <hr>
                            
                            <table class="table table-responsive text-center table-bordered mt-3">
                                <tbody>
                                    @if(isset($bycaste))
                          <tr>
                              <th>Date</th>
                              <th>Count</th>
                          </tr>
                            @foreach($bycaste as $key => $data)
                              <tr>
                                  <th>{{$data->createdat}}</th>
                                  <th>{{$data->count}}</th>
                              </tr>
                            @endforeach 
                        @endif 
                        @if(isset($cwrs))
                        <thead>
                            <tr>
                                <th>Date</th>
                                @foreach($cwrs as $key => $data)
                                <td>{{$data->subname}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Date</th>
                                @foreach($cwrs as $key => $data)
                                <td>{{$data->count}}</td>
                                @endforeach
                            </tr>
                        </thead>
                        @endif 
                        @if(isset($caste_name))
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>User Role</td>
                                    <td>User Name</td>
                                    <td>Caste</td>
                                    <td>Payment Status</td>
                                    <td>Created at</td>
                                </tr>
                            </thead>
                            @foreach($caste_name as $key => $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->role}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->caste}}</td>
                                <td>{{$data->payment_completed}}</td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                            @endforeach 
                        @endif 
                        @if(isset($all)) 
                          @foreach($all as $key => $data)
                          <tr>
                              <th>{{$data->created_date}}</th>
                              <th>{{$data->caste_name}}</th>
                              <td>{{$data->count}}</td>
                          </tr>
                          @endforeach 
                        @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection