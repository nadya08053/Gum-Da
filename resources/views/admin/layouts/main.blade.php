<?php
use App\Facility;

$user = Auth::user();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>Dashboard</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('/admin/vendor/fontawesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/vendor/metisMenu/dist/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('/admin/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/styles/style.css') }}">

    <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
    @if ( $user->facility_id && $user->role != "Admin" )
        <?php $color = Facility::findOrFail($user->facility_id)->color ?>
        @if ($color!="")
        <style media="screen">
            .normalheader {
                background: {{ $color }};
            }
        </style>
        @endif
    @endif
</head>
<body>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Gym
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">Gym Da APP</span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="#">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="{{ url('/') }}/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-speaker"></i>
                    </a>
                    <ul class="dropdown-menu hdropdown notification animated flipInX">
                        <li>
                            <a>
                                <span class="label label-success">NEW</span> It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-warning">WAR</span> There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-danger">ERR</span> Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See all notifications</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-keypad"></i>
                    </a>
                    <div class="dropdown-menu hdropdown bigmenu animated flipInX">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="projects.html">
                                        <i class="pe pe-7s-portfolio text-info"></i>
                                        <h5>Projects</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="mailbox.html">
                                        <i class="pe pe-7s-mail text-warning"></i>
                                        <h5>Email</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="contacts.html">
                                        <i class="pe pe-7s-users text-success"></i>
                                        <h5>Contacts</h5>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="forum.html">
                                        <i class="pe pe-7s-comment text-info"></i>
                                        <h5>Forum</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="analytics.html">
                                        <i class="pe pe-7s-graph1 text-danger"></i>
                                        <h5>Analytics</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="file_manager.html">
                                        <i class="pe pe-7s-box1 text-success"></i>
                                        <h5>Files</h5>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu hdropdown animated flipInX">
                        <div class="title">
                            You have 4 new messages
                        </div>
                        <li>
                            <a>
                                It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                Lorem Ipsum is simply dummy.
                            </a>
                        </li>
                        <li>
                            <a>
                                Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="sidebar" class="right-sidebar-toggle">
                        <i class="pe-7s-upload pe-7s-news-paper"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/') }}/logout">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="{{ url('/') }}">
                @if (!$user->img)
                    <img src="{{ url('/') }}/admin/images/no_avatar.png" class="img-circle m-b" alt="logo">
                @else
                    <img src="{{ url('/') }}/admin/uploads/users/{{ $user->img }}" class="img-circle m-b" alt="logo">
                @endif
            </a>
            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{ $user->name }}</span>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">My Account <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/') }}/dashboard/profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/') }}/logout">Logout</a></li>
                    </ul>
                </div>

                <div id="sparkline1" class="small-chart m-t-sm"></div>
                <div>
                    <h4 class="font-extra-bold m-b-xs">
                        260 104,200
                    </h4>
                    <small class="text-muted">Visits to the site in the last month.</small>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="{{ url('/') }}/dashboard"> <span class="nav-label">Dashboard</span></a>
            </li>

            <li>
                <a href="{{ url('/') }}/dashboard/userslist"> <span class="nav-label">Users</span></a>
            </li>
            <li>
                <a href="{{ url('/') }}/dashboard/facility"> <span class="nav-label">Facility</span></a>
            </li>

            <li>
                <a href="{{ url('/') }}/dashboard/overview"> <span class="nav-label">Overview</span></a>
            </li>

            <li>
                <a href="{{ url('/') }}/dashboard/calendar"> <span class="nav-label">Calendar</span></a>
            </li>



{{--            <li>
                <a href="#"><span class="nav-label">Users</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('/') }}/dashboard/userslist">List</a></li>
                    <li><a href="{{ url('/') }}/dashboard/user/add">Add</a></li>
                </ul>
            </li>--}}

        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    @yield('content')


            <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
        </span>
        Gym <?=date('Y')?>
    </footer>

</div>

<!-- Vendor scripts -->

<script src="{{ asset('/admin/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery-flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery-flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery-flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('/admin/vendor/flot.curvedlines/curvedLines.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery.flot.spline/index.js') }}"></script>
<script src="{{ asset('/admin/vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/sparkline/index.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('/admin/scripts/homer.js') }}"></script>
<script src="{{ asset('/admin/scripts/charts.js') }}"></script>

<script>

    $(function () {

        /**
         * Flot charts data and options
         */
        var data1 = [ [0, 55], [1, 48], [2, 40], [3, 36], [4, 40], [5, 60], [6, 50], [7, 51] ];
        var data2 = [ [0, 56], [1, 49], [2, 41], [3, 38], [4, 46], [5, 67], [6, 57], [7, 59] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
            },
            grid: {
                tickColor: "#f0f0f0",
                borderWidth: 1,
                borderColor: 'f0f0f0',
                color: '#6a6c6f'
            },
            colors: [ "#62cb31", "#efefef"],
        };

        $.plot($("#flot-line-chart"), [data1, data2], chartUsersOptions);

        /**
         * Flot charts 2 data and options
         */
        var chartIncomeData = [
            {
                label: "line",
                data: [ [1, 10], [2, 26], [3, 16], [4, 36], [5, 32], [6, 51] ]
            }
        ];

        var chartIncomeOptions = {
            series: {
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: "#64cc34"

                }
            },
            colors: ["#62cb31"],
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        };

        $.plot($("#flot-income-chart"), chartIncomeData, chartIncomeOptions);



    });

</script>


</body>

</html>
