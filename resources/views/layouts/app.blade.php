<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PM | {{ Auth::user()->user_id }}</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/croppie.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-danger">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="{{url('/')}}" class="nav-link">Home</a> </li>
                <li class="nav-item d-none d-sm-inline-block"> <a href="{{url('contactus')}}" class="nav-link">Contact</a> </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li><a class="mr-3" href="{{url('/')}}"> {{ Auth::user()->user_id }} </a> </li>
                <li><i class="fa fa-power-off"></i><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a> </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-4 sidebar-light-danger">
            <a href="{{url('/')}}" class="brand-link bg-danger"> <img src="/img/Logo-PonnuMaapillai.png" alt="Ponnu MaapillaiLogo" class="brand-image img-circle elevation-3"> <strong class="text-white" style="font-size: 21px;"> Ponnu Maapillai</strong> </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image"> <img src="/images/uploads/profile_pic/{{Auth::user()->profile_pic}}" class="img-circle elevation-2" alt="User Image"> </div>
                    <div class="info"> <a href="#" class="d-block">{{ Auth::user()->name }}</a> </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @if(Auth::user()->profile_completed == 1)
                            <li class="nav-item">
                                <a href="{{url('/')}}" class="nav-link"> <i class="nav-icon fa fa-th"></i>
                                    <p> Dash Board </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('myprofile') }}" class="nav-link"> <i class="nav-icon fa fa-user"></i>
                                    <p>My Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user/update-profile1')}}" class="nav-link"> <i class="nav-icon fa fa-pencil-square-o"></i>
                                    <p> Modify My Profile </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/paymentstatus')}}" class="nav-link"> <i class="nav-icon fa fa-credit-card-alt"></i>
                                    <p> Payment Details </p>
                                </a>
                            </li>
                            @if(Auth::user()->payment_completed ==1)
                                <li class="nav-item">
                                    <a href="{{ url('/profile/search')}}" class="nav-link"> <i class="nav-icon fa fa-search"></i>
                                        <p> Search Profile </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{('/interestedprofile')}}" class="nav-link"> <i class="nav-icon fa fa-users"></i>
                                        <p> Interested Profile </p>
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ url('/makepayment')}}" class="nav-link"> <i class="nav-icon fa fa-shopping-cart"></i>
                                        <p> Make Payment</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ url('/deleteUser') }}" class="nav-link"> <i class="nav-icon fa fa-trash"></i>
                                    <p> Delete Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/profile/change-password')}}" class="nav-link"> <i class="nav-icon fa fa-key"></i>
                                    <p> Change Password</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/user/create-profile1')}}" class="nav-link"> <i class="nav-icon fa fa-user"></i>
                                    <p> Create Your Profile</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/profile/change-password')}}" class="nav-link"> <i class="nav-icon fa fa-key"></i>
                                    <p> Change Password</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
        <div class="container" style="margin-top:-500 "></div>
        <hr>
        <footer class="footer text-muted d-print-none" id="main_footer">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="copy">
                            <p class="footer-block">| <a href="{{ url('about-us') }}" class="text-danger">About Us</a> | <a href="{{ url('Privacy') }}" class="text-danger">Privacy Policy</a> | <a href="{{ url('Terms') }}" class="text-danger">Terms and Conditions</a> | <a href="{{ url('gallery') }}" class="text-danger">Photo Gallery</a> | <a href="{{ url('contactus') }}" class="text-danger">Reach Us</a></p>
                            <p>All Rights Reserved.Copyright.© 2018 Ponnu Maapillai Developed By <a href="http://linepix.in">Linepix.in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminlte.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap-4.0.0.js"></script>
    <script src="/js/croppie.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @yield('scripts')
</body>

</html>