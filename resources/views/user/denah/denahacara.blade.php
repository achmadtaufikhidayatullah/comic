@extends('layout/mainuser')


@section('title','Denah Acara')
@section('info','active')

@section('content')
<div class="container center mb-5">
	<h1 class="text-center mt-1">DENAH ACARA</h1>
	<h3 class="text-center">lokasi fasilitas yang disediakan selama COMIC </h3>
			<img src="{{URL::asset('user/img/denah/acaraout.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
			<img src="{{URL::asset('user/img/denah/acara1.jpg')}}" class="img-fluid mt-5" alt="Responsive image">
			<img src="{{URL::asset('user/img/denah/acara2.jpg')}}" class="img-fluid mt-5" alt="Responsive image">
			<img src="{{URL::asset('user/img/denah/acara3.jpg')}}" class="img-fluid mt-5" alt="Responsive image">
			<img src="{{URL::asset('user/img/denah/acara4.jpg')}}" class="img-fluid mt-5" alt="Responsive image">
	</div>
</div>
@endsection