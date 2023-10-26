<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Test Project</title>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/lib/jqvmap/jqvmap.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery Sparkline -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.3/jquery.sparkline.min.js"></script>



    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <style>
        ::-webkit-scrollbar {
            width: 5px;
        }


        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgb(128, 128, 128);
            border-radius: 10px;
        }


        ::-webkit-scrollbar-thumb {
            background: #0c6bca;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #072c52;
        }
    </style>

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
</head>

<body>

    <div class="be-wrapper be-fixed-sidebar">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <div class="be-navbar-header"><a class="navbar-brand" href="{{ url('/') }}">Test Project</a>
                </div>
                <div class="page-title"><span>Dashboard</span></div>
                <div class="be-right-navbar">
                    <ul class="nav navbar-nav float-right be-user-nav">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown" role="button" aria-expanded="false"><img
                                    src="{{ asset('public/assets/img/avatar.png') }}" alt="Avatar"><span
                                    class="user-name">

                                </span></a>
                            <div class="dropdown-menu" role="menu">
                                <div class="user-info">
                                    @if (Auth::check())
                                        <div class="user-name">{{ Auth::user()->name }}</div>
                                    @endif
                                </div><a class="dropdown-item" href="{{ url('auth/logout') }}"><span
                                        class="icon mdi mdi-power"></span>Logout</a>
                            </div>
                        </li>

                </div>
            </div>
        </nav>
