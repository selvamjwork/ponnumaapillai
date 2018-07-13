@extends('admin.layout.home')

@section('head')
{!! Charts::assets() !!}
@endsection
@section('content')
<!--Chart-box-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
              <!-- <canvasmonth id="canvas" class="chart">{!! $chart->render() !!}</canvasmonth> -->
              <form><input type="submit" class="btn btn-success" Value="today" name="today"><input type="submit" class="btn btn-success" Value="onemonth" name="onemonth"></form>
             <form>
                       <select required="required" name="caste" class="form-control">
                            <option value="">Select Caste</option>
                             @foreach($casteid as $key => $value)
                             <option value="{{$value->id}}">{{$value->caste_name}}</option>
                             @endforeach
                     </select>
              <input type="submit">
             </form>
              <table class="table table-bordered table-striped">
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
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--End-Chart-box-->
@endsection