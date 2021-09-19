@extends('layout/mainnilai')

@section('title','Kelola Nilai')

@section('sidebar')
<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				@foreach($lomb as $l)
				<li><a href="/adminnilai/{{$l->id}}" class="@yield('dashboard')"><i class="lnr lnr-star"></i> <span>{{$l->mata_lomba}}</span></a></li>
				@endforeach
			</ul>
		</nav>
	</div>
</div>
@endsection

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="callout callout-info">
				<h4 style="text-transform: capitalize;">Selamat Datang di Kelola Nilai</h4>
				<p>Silahkan pilih nilai sesuai dengan mata lomba pada enu di sisi kiri. </p>
			</div>
		</div>
	</div>
</div>
@endsection