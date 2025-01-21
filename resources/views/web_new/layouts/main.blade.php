<!doctype html>
<html lang="en">
<head>
	<!-- Header -->
	@include('web_new.layouts.header')
</head>
<body>
	<!-- Navbar -->
	@include('web_new.layouts.navbar')
	
	<!-- Main content -->
	@yield('content')
	
	<!-- Footer -->
	@include('web_new.layouts.footer')
	
	<!-- Page js -->
	@yield('pagejs')
</body>
</html>	