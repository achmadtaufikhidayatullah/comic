@extends('layout/mainuser')


@section('title','Rundown')
@section('info','active')

@section('content')
<div class="container center mb-5">
	<h1 class="text-center mt-2">Rundown Pelaksanaan Acara dan Lomba</h1>
	<div class="row">
		<div class="col-md-6">
			<img src="{{URL::asset('user/img/rundown/acara.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
		</div>
		<div class="col-md-6">
			<img src="{{URL::asset('user/img/rundown/lomba.jpg')}}" class="img-fluid mt-3" alt="Responsive image">
		</div>
	</div>
</div>
@endsection