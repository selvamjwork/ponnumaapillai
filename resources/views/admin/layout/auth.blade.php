<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ponnu mappillai Admin</title>

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"  />
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="/css/bootstrap-wysihtml5.css" rel="stylesheet" />
    <link href="/css/colorpicker.css" rel="stylesheet" />
    <link href="/css/datepicker.css" rel="stylesheet" />
    <link href="/css/uniform.css" rel="stylesheet" />
    <link href="/css/select2.css" rel="stylesheet" />
    <link href="/css/fullcalendar.css" rel="stylesheet" />
    <link href="/css/matrix-style.css" rel="stylesheet" />
    <link href="/css/matrix-media.css" rel="stylesheet" />
    <link href="/css/jquery.gritter.css" rel="stylesheet" />
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    @yield('head')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

.dropbtn2 {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown2 {
    position: relative;
    display: inline-block;
}

.dropdown-content2 {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content2 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content2 a:hover {background-color: #ddd}

.dropdown2:hover .dropdown-content2 {
    display: block;
}

.dropdown2:hover .dropbtn2 {
    background-color: #3e8e41;
}
</style>
</head>
<body>
    <!--Header-part-->
    <div id="header">
      <!-- <h1><a href="dashboard.html">Matrix Admin</a></h1> -->
    </div>
    <!--close-Header-part--> 
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
      <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->name }}</span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
            <li class="divider"></li>
            <li><a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a></li>
          </ul>
        </li>
        
        <li  class="dropdown" id="day-report" >
            <a title="" href="#" data-toggle="dropdown" data-target="#day-report" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Day Report</span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{url('/admin/dashboard/castewisereport?today=today')}}">Todays Report</a></li>
                <li class="divider"></li>
                <li><a href="{{url('/admin/dashboard/castewisereport?onemonth=onemonth')}}">Last Month</a></li>
              </ul>
        </li>
        <li  class="dropdown" id="caste-report" >
            <a title="" href="#" data-toggle="dropdown" data-target="#caste-report" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Caste Wise Report</span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                @foreach($casteid as $key => $value)
                <li>
                    <a href="{{url('/admin/dashboard/castewisereport')}}?caste={{$value->id}}">{{$value->caste_name}}</a>
                </li>
                <li class="divider"></li>
                @endforeach
              </ul>
        </li>
        <li>
            <a href="/admin/dashboard/castewisereport?subadmins=subadmins"><i class="icon icon-user"></i>  <span class="text">Admin Day Wise</span><b class="caret"></b></a>
        </li>
        <li class="">
            <a title="" href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
      </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
      <ul>
        <li><a href="{{url('/admin/dashboard/no-of-user')}}"    ><i class="icon-user"></i> No of User</a></li>
        <li><a href="{{url('/admin/manage-user')}}"><i class="icon icon-user"></i> <span>Manage Users</span></a> </li>
        <li><a href="{{url('/admin/manage-subadmin')}}"><i class="icon icon-user"></i> <span>Manage Subadmin</span></a> </li>
        <li><a href="{{url('/admin/profile/search')}}"><i class="icon icon-search"></i> <span>Profile Search</span></a> </li>
        <li><a href="{{url('/admin/paymentdetails')}}"><i class="icon-check"></i> Pyament Details</a></li>
      </ul>
    </div>
    <!--sidebar-menu-->  
    <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->
        @yield('content')
    </div>

    <!--Footer-part-->

    <div class="row-fluid">
  <div id="footer" class="span12"> <p>All Rights Reserved.Copyright.© 2017-2018 Ponnu Maapillai Developed By <a href="http://linepix.in">Linepix.in</a></p></div>
</div>

    <!--end-Footer-part-->
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/excanvas.min.js"></script> 
    <script src="/js/jquery.min.js"></script> 
    <script src="/js/jquery.ui.custom.js"></script> 
    <script src="/js/bootstrap.min.js"></script> 
    <script src="/js/jquery.flot.min.js"></script> 
    <script src="/js/jquery.flot.resize.min.js"></script> 
    <script src="/js/jquery.peity.min.js"></script> 
    <script src="/js/fullcalendar.min.js"></script> 
    <script src="/js/matrix.js"></script> 
    <script src="/js/matrix.dashboard.js"></script> 
    <script src="/js/jquery.gritter.min.js"></script> 
    <script src="/js/matrix.interface.js"></script> 
    <script src="/js/matrix.chat.js"></script> 
    <script src="/js/jquery.validate.js"></script> 
    <script src="/js/matrix.form_validation.js"></script> 
    <script src="/js/jquery.wizard.js"></script> 
    <script src="/js/jquery.uniform.js"></script> 
    <script src="/js/select2.min.js"></script> 
    <script src="/js/matrix.popover.js"></script> 
    <script src="/js/jquery.dataTables.min.js"></script> 
    <script src="/js/matrix.tables.js"></script>
    <script src="/js/jquery.min.js"></script> 
    <script src="/js/jquery.ui.custom.js"></script> 
    <script src="/js/bootstrap.min.js"></script> 
    <script src="/js/bootstrap-colorpicker.js"></script> 
    <script src="/js/bootstrap-datepicker.js"></script> 
    <script src="/js/jquery.toggle.buttons.js"></script> 
    <script src="/js/masked.js"></script> 
    <script src="/js/jquery.uniform.js"></script> 
    <script src="/js/select2.min.js"></script> 
    <script src="/js/matrix.js"></script> 
    <script src="/js/matrix.form_common.js"></script> 
    <script src="/js/wysihtml5-0.3.0.js"></script> 
    <script src="/js/jquery.peity.min.js"></script> 
    <script src="/js/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript">
        @yield('scripts')
    </script>
</body>
</html>