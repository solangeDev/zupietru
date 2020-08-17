<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{url('/')}}" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Zu'Pietrù</strong></span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#modal-user-settings" data-toggle="modal">
                        <img src="{{ asset('admin/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                <div class="sidebar-user-links">
                    <a href="#modal-user-settings" data-toggle="modal"><i class="gi gi-user"></i></a>
                    <!-- <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a> -->
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <!-- <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a> -->

                    <a data-toggle="tooltip" data-placement="bottom" title="Logout" class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="gi gi-exit"></i>
                    </a>

                    <form id="" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Theme Colors -->
            <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
            <!-- <ul class="sidebar-section sidebar-themes clearfix sidebar-nav-mini-hide"> -->
                <!-- You can also add the default color theme
                <li class="active">
                    <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                </li>
                -->
                <!-- <li>
                    <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="/admin/css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="/admin/css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="/admin/css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="/admin/css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="/admin/css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="/admin/css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="/admin/css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="/admin/css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-coral themed-border-coral" data-theme="/admin/css/themes/coral.css" data-toggle="tooltip" title="Coral"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-lake themed-border-lake" data-theme="/admin/css/themes/lake.css" data-toggle="tooltip" title="Lake"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-forest themed-border-forest" data-theme="/admin/css/themes/forest.css" data-toggle="tooltip" title="Forest"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-waterlily themed-border-waterlily" data-theme="/admin/css/themes/waterlily.css" data-toggle="tooltip" title="Waterlily"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-emerald themed-border-emerald" data-theme="/admin/css/themes/emerald.css" data-toggle="tooltip" title="Emerald"></a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="themed-background-dark-blackberry themed-border-blackberry" data-theme="/admin/css/themes/blackberry.css" data-toggle="tooltip" title="Blackberry"></a>
                </li>
            </ul> -->
            <!-- END Theme Colors -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                {{-- @include('layouts.admin.partials.navigation') --}}
                @include('layouts.menu')
            </ul>
            <!-- END Sidebar Navigation -->

            <!-- Sidebar Notifications -->
            <!-- <div class="sidebar-header sidebar-nav-mini-hide">
                <span class="sidebar-header-options clearfix">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                </span>
                <span class="sidebar-header-title">Activity</span>
            </div>
            <div class="sidebar-section sidebar-nav-mini-hide">
                <div class="alert alert-success alert-alt">
                    <small>5 min ago</small><br>
                    <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                </div>
                <div class="alert alert-info alert-alt">
                    <small>10 min ago</small><br>
                    <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                </div>
                <div class="alert alert-warning alert-alt">
                    <small>3 hours ago</small><br>
                    <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                </div>
                <div class="alert alert-danger alert-alt">
                    <small>Yesterday</small><br>
                    <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug submitted</strong></a>
                </div>
            </div> -->
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->
