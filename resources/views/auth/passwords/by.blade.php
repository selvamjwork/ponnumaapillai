@extends('layouts.guest')

@section('content')
<div class="container main-container">
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a class="glyphicon glyphicon-arrow-left" aria-hidden="true" href="/login"></a>&nbsp&nbsp&nbspSelect Which way want to reset</div>

                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <a href="/password/reset-mobile" class="btn btn-success">By Mobile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
