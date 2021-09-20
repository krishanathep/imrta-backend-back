<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<link
		rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
		integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
		crossorigin="anonymous"
	/>

	<!--
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
	-->

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/dist/css/clean-switch.css') }}">

	<!-- jQuery -->
	<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.css') }}" />
	<script src="{{ asset('backend/dist/js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

	<script src="{{ asset('backend/dist/js/sweetalert2@11.js') }}"></script>
	<script src="{{ asset('backend/dist/js/jspdf.min.js') }}"></script>
	<script src="{{ asset('backend/dist/js/printThis.js') }}"></script>

	<!-- Custom -->
	<link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css') }}">
	<script src="{{ asset('backend/dist/js/custom.js') }}"></script>

	@yield('third_party_stylesheets')

	@stack('page_css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<!-- Main Header -->
	<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
	<nav class="main-header navbar navbar-expand">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
					<i class="nav-icon fas fa-user"></i>
					<span class="d-none d-md-inline">{{ Auth::user()->admin_name }}</span>
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<!-- User image -->
					<li class="user-header">
						<img src="https://www.knowmuhammad.org/img/noavatarn.png"
							 class="img-circle elevation-1"
							 alt="User Image">
						<p>
							{{ Auth::user()->name }}
							<small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
						</p>
					</li>
					<!-- Menu Footer-->
					<li class="user-footer">
						<a href="{{ route('admin-setting-admin.show', Auth::user()->admin_id) }}" class="btn btn-default btn-flat">Profile</a>
						<a href="#" class="btn btn-default btn-flat float-right"
						   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							Sign out
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				</ul>
			</li>
		</ul>
	</nav>

	<!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content">
			@yield('content')
		</section>
	</div>

	<!-- Main Footer -->
	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			Dark Mode 
			<label class="cl-switch cl-switch-green">
				<input
					id="darkmode-switch" type="checkbox"
					onchange="DarkmodeSwitch()"
				/>
				<span class="switcher"></span>
				<span class="label"></span>
			</label>
		</div>
		<strong>Copyright &copy; 2021 <a href="#">สถาบันวิจัยและประเมินเทคโนโลยีทางการแพทย์</a></strong> All rights
		reserved.
	</footer>
</div>

<!--
<script src="{{ mix('js/app.js') }}" defer></script>
-->


<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>

<script>
	ColorModeInit();
</script>

@yield('third_party_scripts')

@stack('page_scripts')

</script>

</body>
</html>