<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | COMIC</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{URL::asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('admin/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{URL::asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{URL::asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('admin/assets/img/icon-comic.png')}}">
</head>

<body>
	<!-- WRAPPER -->

	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">

				<div class="auth-box ">
					<div class="left">
						<div class="content " >
							<div class="header">
								<div class="logo text-center"><img src="{{URL::asset('admin/assets/img/logo-comic.png')}}" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
								<!-- notif -->
								@if(session('error'))
								<div class="alert alert-danger alert-dismissible container"role="alert" style="width:100%; height: 50px;">
									{{ session('error') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif
							</div>
							<form class="form-auth-small" action="/postlogin" method="post">
								@csrf
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" placeholder="Email" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" placeholder="Password" name="password"required oninvalid="this.setCustomValidity('password tidak boleh kosong')" oninput="setCustomValidity('')" style="width: 85%;">
									<span class="input-group-btn pull-right" style="top:-54px;left: -59px;">
										<button class="btn btn-default " type="button" id="show-password"><i class="lnr lnr-eye"></i></button>
									</span>
								</div><br>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-home"></i> <a href="/">Ke Halaman Home</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Competition Of Islamic Creativity</h1>
							<p>Login Khusus Admin dan Juri</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="{{URL::asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{URL::asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{URL::asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{URL::asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{URL::asset('admin/assets/scripts/klorofil-common.js')}}"></script>
	<script src="{{URL::asset('select2/dist/js/select2.full.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('datatables/datatables.min.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#show-password").click(function(){
				if($('#signin-password').attr('type') == 'password'){
					$('#signin-password').attr('type','text');
				}else{
					$('#signin-password').attr('type','password');
				}
			});
		});
	</script>
</body>
</html>
