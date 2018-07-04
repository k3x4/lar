<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Admin panel</title>

        @section('head')

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-blue.min.css') }}">

        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('js/lib/icheck-2/skins/flat/blue.css') }}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
        
        <script src="{{ asset('js/app.js') }}"></script>

        @show

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        <div class="wrapper">

            @include('admin.layout.partials.header')

            @include('admin.layout.partials.sidebar')
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
        
                    @yield('content')
                    
                </section>
                <!-- /.content -->    
            
            </div>
            <!-- /.content-wrapper -->
    
            @include('admin.layout.partials.footer')

        </div>
        <!-- ./wrapper -->

        @include('admin.layout.partials.footer_scripts')

    </body>
</html>