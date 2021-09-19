<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{URL::asset('user/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::asset('user/css/style.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-comic">
		<div class="container">
		<a class="navbar-brand" href="#">
			<img src="{{URL::asset('user/img/logo-comic-UI.png')}}" height="30" alt="" loading="lazy">
		</a>

		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item @yield('home')">
					<a class="nav-link text-white " href="/">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown @yield('info')">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Informasi
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/rundown">Rundown</a>
						<a class="dropdown-item" href="/denahacara">Denah acara</a>
						<a class="dropdown-item" href="/denahregist">Denah Registrasi</a>
						<a class="dropdown-item" href="/denahlomba">Denah Lomba</a>
						<!-- <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a> -->
					</div>
				</li>
				<li class="nav-item @yield('nilai')">
					<a class="nav-link text-white" href="/nilaipeserta">Nilai</a>
				</li>
				<li class="nav-item @yield('about')">
					<a class="nav-link text-white" href="/about">About</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-white" href="/login" onclick="return confirm('Login hanya untuk Admin dan Juri, Tekan Oke jika anda termasuk salah satunya');">Login</a>
				</li>
			</ul>
		</div>
		</div>
	</nav>

	@yield('content')
	
	<footer class="footer py-3 bg-comic">
		<div class="container">
			<span><i class="far fa-copyright"></i> 2020 | COMIC MCOS STIKOM BALI.</span>
		</div>
	</footer>


	<script src="{{URL::asset('user/js/jquery.js')}}"></script>
	<script src="{{URL::asset('user/js/bootstrap.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
			});
		});
	</script>
</body>
</html>