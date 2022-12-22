<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/backend/img/favicon.html">

    <title>@yield('title')</title>
    @include('admin.inc.css')

</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="{{ route('dashboard') }}" class="logo">Hos<span>Pital</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->

            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username">{{ auth()->user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="javascript:void(0)"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit(); " role="button">
                                        <i class="fa fa-key"></i>
                                        {{ __('LogOut') }}
                                    </a>
                                </div>
                            </form>
                        </li>

                    </ul>

                </li>
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{ request()->routeIs('dashboard') ?'active':'' }} " href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"  class="{{--{{ request()->routeIs('index') ?'active':'' }} {{ request()->routeIs('create') ?'active':'' }}--}}" >
                        <i class="fa fa-laptop"></i>
                        <span>Doctor</span>
                    </a>
                    <ul class="sub">
                        <li class=""><a href="">Add Doctor</a></li>
                        <li class="" ><a href="">Manage Doctors</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" style="min-height: 600px;">
        <section class="wrapper">

            @yield('main-contant')

        </section>
    </section>
    <!--main content end-->



    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2018 &copy; FlatLab by VectorLab.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>


@include('admin.inc.script')
</body>
</html>

