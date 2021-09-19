<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
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
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('admin/assets/img/icon-comic.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('admin/assets/img/icon-comic.png')}}">
	<!-- select2 -->
	<link href="{{URL::asset('select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('datatables/datatables.min.css')}}"/>
	<!-- Style + -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('style.css')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/"><img src="{{URL::asset('admin/assets/img/logo-comic.png')}}" alt="Klorofil Logo" class="img-responsive logo" style="margin-top: -10px; margin-bottom: -15px;"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>

					<!-- Nilai -->
					@if( auth()->user()->level === 'admin')
					<a href="/adminnilai" class="btn btn-primary btn-sm" style="margin-top: -15px;">
						<i class="lnr lnr-menu"></i>
						 <span>Nilai</span>
					</a>
					@endif
			</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{URL::asset('admin/assets/img/avatarcomic.png')}}" class="img-circle" alt="Avatar"><span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>

						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="@yield('dashboard')"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if( auth()->user()->level === 'admin')
						<!-- <li><a href="/peserta" class="@yield('peserta')"><i class="lnr lnr-user"></i><span>Peserta</span></a></li> -->
						
						<li>
							<a href="#subpeserta" data-toggle="collapse" class="collapsed @yield('peserta')"><i class="lnr lnr-user"></i><span>peserta</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subpeserta" class="collapse ">
								<ul class="nav">
									<li><a href="/peserta" class="">Data Peserta</a></li>
									<li><a href="/pesertalomba" class="">Hapus Peserta Lomba</a></li>
								</ul>
							</div>
						</li>

						<!-- <li><a href="/juri" class="@yield('juri')"><i class="lnr lnr-users"></i><span>Juri</span></a></li> -->
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed @yield('juri')"><i class="lnr lnr-user"></i><span>Juri</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="/juri" class="">Regist Juri</a></li>
									<li><a href="/jurilomba" class="">Juri Lomba</a></li>
								</ul>
							</div>
						</li>

						<li><a href="/sekolah" class="@yield('sekolah')"><i class="lnr lnr-apartment"></i><span>Sekolah</span></a></li>

						<li><a href="/lomba" class="@yield('lomba')"><i class="lnr lnr-license"></i><span>Lomba</span></a></li>

						<li><a href="/kriteria" class="@yield('kriteria')"><i class="lnr lnr-bookmark"></i><span>Kriteria Penilaian</span></a></li>

						<li><a href="/tingkat" class="@yield('tingkat')"><i class="lnr lnr-graduation-hat"></i><span>Tingkat</span></a></li>

						<li><a href="/master" class="@yield('master')"><i class="lnr lnr-smartphone"></i><span>Master Smartphone</span></a></li>


						@endif
						
						@if( auth()->user()->level === 'juri')
							<li><a href="/nilai" class="@yield('penilaian')"><i class="lnr lnr-spell-check"></i><span>Penilaian</span></a></li>
						@endif

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		
		<!-- content -->
		@yield('content')
		<!-- /content -->

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
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
	@yield('footer')


	<script>
	$(document).ready(function() {
	    $('.select2').select2();
	    $('#table_id').DataTable({
	    	ordering: false
	    });	

	    $('#table_nilai').DataTable({
	    	ordering: false,
	    	paging: false
	    });
	});


	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
