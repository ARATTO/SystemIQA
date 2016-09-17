<!DOCTYPE html>
<html>
<head>
	@include('template.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	@include('template.partials.nav')

	<section>
		@include('flash::message')
		@yield('content')

	</section>


	@include('template.partials.import_script')
	@include('template.partials.load')
</body>
</html>
