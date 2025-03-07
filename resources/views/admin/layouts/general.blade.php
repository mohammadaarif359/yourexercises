<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Template') }}</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
		<!-- Toastr -->
		<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">	 
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		</head>
		<body class="hold-transition login-page">
			@yield('content')
			
			<!-- jQuery -->
			<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
			<!-- Bootstrap 4 -->
			<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
			<!-- Toastr -->
			<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
			<!-- AdminLTE App -->
			<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

			<script>
				@if(Session::get('success'))
					toastr.success('{!! Session::get('success') !!}')
				@elseif(Session::get('error'))
					toastr.error('{!! Session::get('error') !!}')
				@endif
			</script>
			@yield('pagejs')
		</body>
</html>	