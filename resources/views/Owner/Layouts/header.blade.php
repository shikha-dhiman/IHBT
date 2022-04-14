<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>IHBT Electronic Health Record Software</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset('user_asset/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('user_asset/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="{{asset('user_asset/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="{{('user_asset/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet')}}">
    <!-- Page plugins css -->
    <link href="{{asset('user_asset/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet')}}">
    <!-- Color picker plugins css -->
    <link href="{{asset('user_asset/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet')}}">
    <!-- Date picker plugins css -->
    <link href="{{asset('user_asset/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet')}}">
    <!-- Daterange picker plugins css -->
    <link href="{{asset('user_asset/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet')}}">
    <link href="{{asset('user_asset/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet')}}">
    
    <!-- Custom Stylesheet -->
    <link href="{{asset('user_asset/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('user_asset/css/custom.css')}}" rel="stylesheet">
</head>

<body>
     <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="nav-header" style="background-color:#ffff !important ;">
            <div class="brand-logo">
                <a href="">
                    <b class="logo-abbr"><img src="{{asset('user_asset/images/logo-logo-2.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('user_asset/images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{asset('user_asset/images/logo-logo-2.png')}}" 
                        style="height: 80px; width: 80px; margin-left: 54px; margin-top:-25px;" alt="">
                        <!-- <h2 class="text-white">IHBT</h2> -->
                    </span>

                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
