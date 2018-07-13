@extends('subadmin.layout.login')

<!-- Main Content -->
@section('content')
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
        <h3>Ponnu Mappliai Sub Admin.</h3>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form role="form" method="POST" action="{{ url('/subadmin/password/email') }}">
                {{ csrf_field() }}
                <h1>Reset Password</h1>

                <div>
                    <input id="email" type="email" placeholder="E-Mail" class="form-control" name="email" value="{{ old('email') }}" autofocus required>
                </div>
                <div>
                    <button class="btn btn-default submit" type="submit">Send Password Reset Link</button>
                </div>

                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <p>©2017-2018 All Rights Reserved. Ponnu Mappliai Admin</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
