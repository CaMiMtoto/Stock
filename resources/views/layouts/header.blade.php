<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
             <img src="{{ asset('img/logo.png') }}" style="height: 30px;" alt="">
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
             <img src="{{ asset('img/logo.png') }}" style="height: 50px;" alt="">
            <small>Rwiza Village</small>
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/avatar.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->name }} - {{ Auth::user()->role->display }}
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#"
                                   id="logout_link"
                                   class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>

<form id="logoutForm" style="display: none" action="{{ route('logout') }}" method="post">
    @csrf
</form>
