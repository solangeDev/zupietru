<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.admin.partials.head')
    <body>
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <!-- Preloader -->
            @include('layouts.admin.partials.preloader')
            <!-- END Preloader -->

            <!-- Page Container -->
            <div id="page-container" class="header-fixed-top footer-fixed sidebar-no-animations sidebar-mini sidebar-visible-lg sidebar-visible-lg">
            <!-- <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations"> -->
                <!-- Alternative Sidebar -->
                @include('layouts.admin.partials.sidebar-alt')
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                @include('layouts.admin.partials.sidebar')
                <!-- END Sidebar -->



                <!-- Main Container -->
                <div id="main-container">
                    <!-- Main Header -->
                    @include('layouts.admin.partials.header')
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">

                        @yield('content')

                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                    @include('layouts.admin.partials.footer')
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top" class="pull-right"><i class="fa fa-angle-double-up"></i></a>

        @include('layouts.admin.partials.modal-user-settings')

        @include('layouts.admin.partials.scripts')
    </body>
</html>