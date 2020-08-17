<!-- Header -->
<header class="navbar navbar-default navbar-fixed-top">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Search Form -->
    <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
        <div class="form-group">
            <!-- <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search.."> -->
        </div>
    </form>
    <!-- END Search Form -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- Alternative Sidebar Toggle Button -->
        <li>
            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
            <!-- <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');this.blur();"> -->
                <!-- <i class="gi gi-share_alt"></i>
                <span class="label label-primary label-indicator animation-floating">4</span> -->
            </a>
        </li>
        <!-- END Alternative Sidebar Toggle Button -->

        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('admin/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="divider"></li>
                <li>
                    <a href="#modal-user-settings" data-toggle="modal">
                        <i class="fa fa-user fa-fw pull-right"></i>
                        Profile
                    </a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <!-- <a href="#modal-user-settings" data-toggle="modal">
                        <i class="fa fa-cog fa-fw pull-right"></i>
                        Settings
                    </a> -->
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{url('/')}}"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a>
                    <a data-toggle="tooltip" data-placement="bottom" title="Logout" class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="gi gi-exit pull-right"></i>Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>
<!-- END Header