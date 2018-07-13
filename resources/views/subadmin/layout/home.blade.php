<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Ponnu Mappillai Subadmin</title>

    <!-- Bootstrap -->
    <link href="/subadmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/subadmin/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/subadmin/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/subadmin/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/subadmin/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/subadmin/css/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/subadmin/css/daterangepicker.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/subadmin/css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/subadmin/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/subadmin/home')}}" class="site_title"><span>Ponnu Mappillai</span></a>
            </div>

            <br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{url('/subadmin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                  <li><a href="{{url('/subadmin/manage-user')}}"><i class="fa fa-user"></i> Manage-User </a></li>
                  <li><a href="{{url('/subadmin/paymentdetails')}}"><i class="fa fa-user"></i> Payment Details </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="{{ url('/subadmin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                       <form id="logout-form" action="{{ url('/subadmin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            @yield('content')
          </div>
          <!-- /top tiles -->
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <p>©2017-2018 All Rights Reserved. Ponnu Mappliai Developed By <a href="http://linepix.in">Linepix.in</a></p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="/subadmin/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/subadmin/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/subadmin/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/subadmin/js/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/subadmin/js/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/subadmin/js/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/subadmin/js/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/subadmin/js/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/subadmin/js/skycons.js"></script>
    <!-- Flot -->
    <script src="/subadmin/js/jquery.flot.js"></script>
    <script src="/subadmin/js/jquery.flot.pie.js"></script>
    <script src="/subadmin/js/jquery.flot.time.js"></script>
    <script src="/subadmin/js/jquery.flot.stack.js"></script>
    <script src="/subadmin/js/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/subadmin/js/jquery.flot.orderBars.js"></script>
    <script src="/subadmin/js/jquery.flot.spline.min.js"></script>
    <script src="/subadmin/js/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/subadmin/js/date.js"></script>
    <!-- JQVMap -->
    <script src="/subadmin/js/jquery.vmap.js"></script>
    <!-- <script src="/subadmin/js/jquery.vmap.world.js"></script> -->
    <script src="/subadmin/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/subadmin/js/moment.min.js"></script>
    <script src="/subadmin/js/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/subadmin/js/custom.min.js"></script>

    <script type="text/javascript">
        @yield('scripts')
    </script>

  </body>
</html>