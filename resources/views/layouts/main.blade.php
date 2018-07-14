<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    @section('head')

	<title>@yield('page_title') | {{ config('app.name') }}</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />

	@show

</head>

<body class="stretched no-transition">

	<div id="wrapper" class="clearfix">

        @include('layouts.partials.header')

		<section id="content">

			<div class="content-wrap">

				@yield('content')

			</div>

		</section>

        @include('layouts.partials.footer')

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    
    @include('layouts.partials.footer_scripts')

</body>
</html>