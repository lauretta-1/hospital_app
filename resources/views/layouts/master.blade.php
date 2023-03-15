<!DOCTYPE html>
<html lang="en" >

<!-- patients23:17-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">
    <title>Patients Box</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <!-- BEGIN #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed ">
        <div class="header">
            <div class="header-left">
                <a href="index-2.html" class="logo">
                    <img src="{{asset('assets/img/logo.png')}}" width="35" height="35" alt=""> <span>My Patients Box</span>
                </a>
            </div>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" width="40" alt="Admin">
                            <span class="status online"></span></span>
                        <span>Clerk Desk</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('consultations.add')}}">Consultations</a>
						<a class="dropdown-item" href="{{route('patients.index')}}">Patients</a>
					</div>
                </li>
            </ul>
        </div>

        <!-- BEGIN #content -->
            <div id="content" class="app-content">
                <div class="row">
                    <div class="col-6">
                        <h1 class="page-header">@yield('title')
                            <small>
                                @yield('title_sentence')
                            </small>
                        </h1>
                    </div>


                    <div class="col-6" style="text-align: right;">
                        @yield('page_header_button')
                    </div>
                </div>
                @yield('content')
            </div>
    <!-- BEGIN #content -->
        <!-- END theme-panel -->
    </div>
<!-- END #app -->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/ajaxtab.js')}}"></script>
    @stack('page_script')
</body>
