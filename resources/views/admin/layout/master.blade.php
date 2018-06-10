<!DOCTYPE html>

<html lang="en" >

    <!-- begin::Head -->
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Admin panel</title>
        
        @section('head')

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->

		<script src="{{ asset('assets/js/lib/jquery/jquery.min.js') }}"></script>

		<link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">

        <!--begin::Base Styles -->
		<link href="{{ asset('assets/admin/theme/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/theme/demo/demo7/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
        <!--<link rel="shortcut icon" href="assets/demo/demo7/media/img/logo/favicon.ico" />-->
        
        @show

	</head>
	<!-- end::Head -->

    <!-- begin::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- BEGIN: Header -->
            @include('admin.layout.partials.header')
            <!-- END: Header -->
            
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                
                <!-- BEGIN: Left Aside -->
				@include('admin.layout.partials.left_aside')
				<!-- END: Left Aside -->
                
                <div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					@include('admin.layout.partials.subheader')
                    <!-- END: Subheader -->
                    
					<div class="m-content">
                        @yield('content')
                    </div>
                    
                </div>
                
			</div>
            <!-- end:: Body -->
            
			<!-- begin::Footer -->
			@include('admin.layout.partials.footer')
            <!-- end::Footer -->
            
		</div>
        <!-- end:: Page -->
        
    	<!-- begin::Quick Sidebar -->
		<!--{{-- @include('admin.layout.partials.quick_sidebar') --}}-->
        <!-- end::Quick Sidebar -->
        
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
        <!-- end::Scroll Top -->
        
        <!-- begin::Quick Nav -->
		<!--{{-- @include('admin.layout.partials.quick_nav') --}}-->
		<!-- end::Quick Nav -->	
        
        @include('admin.layout.partials.footer_scripts')

	</body>
	<!-- end::Body -->







</html>