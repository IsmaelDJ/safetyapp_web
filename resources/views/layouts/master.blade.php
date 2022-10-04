<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title> @yield('title') | Tableau de bord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>--}}
{{--    <meta content="Themesbrand" name="author"/>--}}
<!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}">
    @include('layouts.head-css')
    @livewireStyles
</head>

@section('body')
    <body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')

    <script>
        $('#search').click(function(e){
            window.location.href = "/search/"+ $('#search-input').val();
         });
    </script>
    <script>
        $('#search-input').on('keypress', function(e){
            if(e.which == 13){
                e.preventDefault();
                window.location.href = "/search/"+ e.target.value;
            }
         });
    </script>
    @stack('script')
    @livewireScripts
    </body>

</html>
