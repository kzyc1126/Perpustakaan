<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> {{ config('app.name') }}
        {{ isset($title) ? ' | '.$title : '' }}</title>

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    @include('layout.general.ext-css')
    @stack('styles')
    @stack('script')
</head>
@auth

    <body class="hold-transition sidebar-mini layout-fixed ">
        <div class="wrapper d-flex flex-column ">

      

            @include('layout.general.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    @yield('content-header')
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('layout.general.footer')

        </div>


        @include('layout.general.ext-js')
    </body>
@endauth

</html>
