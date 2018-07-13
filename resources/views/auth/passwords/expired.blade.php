@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">Reset Password</div>
            <div class="glass-panal-default">
                <div class="panel-body">
                    <div class="alert alert-success <?php if(!session('status')){ echo 'hidden';}?>" id="alert-status" >
                        {{ session('status') }}
                    </div>
                    <h4>Verification Code is Expired</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection