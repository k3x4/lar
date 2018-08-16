<!DOCTYPE html>
<html>
	<head>

		@include('layouts.partials.head')

	</head>
	<body>

		<div class="body">

            @include('layouts.partials.header')

			<div role="main" class="main">

				@include('layouts.partials.page_header')

				@yield('content')

            </div>
            
            @include('layouts.partials.footer')

		</div>

        @include('layouts.partials.footer_scripts')

	</body>
</html>
