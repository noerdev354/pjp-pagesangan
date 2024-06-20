<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body class="layout-fixed control-sidebar-slide-open sidebar-mini layout-footer-fixed" style="height: auto;">
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- /.Preloader -->

        <!-- Navbar -->
        @include('partials._header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('partials._sidebar')
        <!-- /.Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.Content Wrapper. Contains page content -->

        <!-- Footer -->
        @include('partials._footer')
        <!-- /.Footer -->
    </div>
    <!-- ./wrapper -->
    @include('components.script')
</body>
</html>
