@extends('subadmin.layout.login')

@section('content')
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
        <h3>Ponnu Mappliai Sub Admin.</h3>
            <form role="form" method="POST" action="{{ url('/subadmin/login') }}">
                {{ csrf_field() }}
                <h1>Login Form</h1>

                <div>
                    <input id="email" type="email" placeholder="E-Mail" class="form-control" name="email" value="{{ old('email') }}" autofocus required>
                </div>
                <div>
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                </div>
                <div>
                    <button class="btn btn-default submit" type="submit">Log in</button>
                    <!-- <a class="reset_pass" href="{{ url('/subadmin/password/reset') }}">Lost your password?</a> -->
                </div>

                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <p>©2017-2018 All Rights Reserved. Ponnu Mappliai Developed By <a href="http://linepix.in">Linepix.in</a></p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
