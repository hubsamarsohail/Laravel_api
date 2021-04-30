<!DOCTYPE html>
<html lang="en">

<head>
    @include('sections.head')
</head>

<body>
   

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        @include('sections.navbar')
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('sections.sidebar')
            <!-- page sidebar Ends-->

            <div class="page-body">
                @yield('content')

            </div>

            <!-- footer start-->
            @include('sections.footer')
            <!-- footer end-->
        </div>

    </div>

</body>

</html>