@extends('layout/mainuser')


@section('title','Denah Lomba')
@section('info','active')

@section('content')
<div class="container center mb-5">
	<h1 class="text-center mt-2">DENAH LOMBA</h1>
	<h3 class="text-center">Lokasi Pelaksanaan Lomba </h3>
		<div class="row">

			<div class="col-sm-6">
				<img src="{{URL::asset('user/img/denah/lombapagilt3.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			</div>

			<div class="col-sm-6">
				<img src="{{URL::asset('user/img/denah/lombapagilt4.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			</div>

			<div class="col-sm-6">
				<img src="{{URL::asset('user/img/denah/lombasianglt3.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			</div>

			<div class="col-sm-6">
				<img src="{{URL::asset('user/img/denah/lombasianglt4.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			</div>

			<div class="col-sm-12">
				<img src="{{URL::asset('user/img/denah/lombaout.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			</div>
		</div>
</div>
@endsection