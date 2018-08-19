<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PM | @yield('title')</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="//plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="/css/datepicker3.css">
    <link rel="stylesheet" href="/css/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/css/bootstrap3-wysihtml5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li><i class="fa fa-power-off"></i><a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a> </li>
                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/admin" class="brand-link">
                <img src="/img/Logo-PonnuMaapillai.png" alt="Ponnu Maapillai Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ponnu Maapillai</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('/admin/dashboard/no-of-user')}}" class="nav-link">
                                <i class="fa fa-dashboard nav-icon"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview"> <a href="#" class="nav-link "> <i class="nav-icon fa fa-database"></i>
                        <p> Reports <i class="right fa fa-angle-left"></i> </p>
                        </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item"> <a href="/admin/dashboard/adminwisecastereport" class="nav-link"> <i class="fa fa-calendar-o nav-icon"></i>
                                <p>Admin Date Wise</p>
                                </a> </li>
                                <li class="nav-item"> <a href="/admin/dashboard/castewisereport" class="nav-link"> <i class="fa fa-flag-o nav-icon"></i>
                                <p>Caste Wise</p>
                                </a> </li>
                                <li class="nav-item"> <a href="/admin/dashboard/subadminwisereport" class="nav-link"> <i class="fa fa-user-secret nav-icon"></i>
                                <p>Sub Admin</p>
                                </a> </li>
                                {{-- <li class="nav-item"> <a href="/admin/dashboard/onlineusercount" class="nav-link"> <i class="fa fa-globe nav-icon"></i>
                                <p>Online User Report</p>
                                </a> </li> --}}
                            </ul>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/manage-subadmin" class="nav-link">
                                <i class="fa fa-adn nav-icon"></i>
                                <p>
                                    Sub Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/profile/search')}}" class="nav-link">
                                <i class="fa fa-search nav-icon"></i>
                                <p>
                                    Profile search
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="/admin/scrollingmessage" class="nav-link">
                                <i class="fa fa-flash nav-icon"></i>
                                <p>
                                    Scrolling Message
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/caste" class="nav-link">
                                <i class="fa fa-upload nav-icon"></i>
                                <p>
                                    Caste List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sub-caste" class="nav-link">
                                <i class="fa fa-plus-square-o nav-icon"></i>
                                <p>
                                    Sub Caste List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/manage-user')}}" class="nav-link ">
                                <i class="fa fa-users nav-icon"></i>
                                <p>
                                    Manage Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/album')}}" class="nav-link ">
                                <i class="fa fa-image nav-icon"></i>
                                <p>
                                    Manage Gallery
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        @yield('content')    

        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="copy">
                            <p class="footer-block">| <a href="#" class="text-danger">About Us</a> | <a href="#" class="text-danger">Privacy Policy</a> | <a href="#" class="text-danger">Terms and Conditions</a> | <a href="#" class="text-danger">Reach Us</a> |</p>
                            <p>All Rights Reserved.Copyright.© 2018 Ponnu Maapillai Developed By <a href="http://linepix.in">Linepix.in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button)</script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/js/morris.min.js"></script>
    <script src="/js/jquery.sparkline.min.js"></script>
    <script src="/js/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/js/daterangepicker.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/js/jquery.slimscroll.min.js"></script>
    <script src="/js/fastclick.js"></script>
    <script src="/js/adminlte.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/demo.js"></script>
    @yield('scripts')
</body>
</html>
