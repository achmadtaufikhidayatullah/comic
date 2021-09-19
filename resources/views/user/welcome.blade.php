@extends('layout/mainuser')

@section('title','Home')
@section('home','active')

@section('content')
	

	<!-- slider -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
		</ol>
		<div class="carousel-inner ">
			<div class="carousel-item active">
				<img src="{{URL::asset('user/img/1.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{URL::asset('user/img/2.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{URL::asset('user/img/3.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{URL::asset('user/img/4.jpg')}}" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="{{URL::asset('user/img/5.jpg')}}" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	<div class="container mt-3">
		<img src="{{URL::asset('user/img/alurpeserta.png')}}" class="img-fluid" alt="Responsive image">
	</div>

	<div class="mt-5 mb-5 container">
		<img src="{{URL::asset('user/img/informasi.png')}}" class="img-fluid" alt="Responsive image">
	</div>
@endsection