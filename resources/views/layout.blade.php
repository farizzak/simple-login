<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ URL::asset('global_assets/images/planet_namek.png') }}" rel="shortcut icon" type="image/x-icon">
	<title>Project hahahihi</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<style>
		/* .nav-item{
			padding
		} */
	</style>
	<!-- /global stylesheets -->

	@yield('css')

</head>

<body>

		<!-- Main navbar -->
		@include('navbar')
		<!-- /main navbar -->


		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			@include('sidebar')
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				@yield('content')

				<!-- Footer -->
				<div class="navbar navbar-expand-lg navbar-dark">
					<div class="text-center d-lg-none w-100">
						<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
							<i class="icon-unfold mr-2"></i>
							Footer
						</button>
					</div>

					<div class="navbar-collapse collapse" id="navbar-footer">
						<span class="navbar-text">
							© <?php echo date('Y'); ?>.
							<a href="#">CV. hahahihi</a>
						</span>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Core JS files -->
		<script src="{{asset('global_assets/js/main/jquery.min.js') }}"></script>
		<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
		<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>


		<!-- /core JS files -->

		<script>
			
			
		</script>

	@yield('js')

</body>
</html>
