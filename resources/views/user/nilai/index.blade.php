@extends('layout/mainuser')


@section('title','Nilai Peserta')
@section('nilai','active')

@section('content')

<!-- sidebar -->
<div class="d-flex" id="wrapper">
	<!-- Sidebar -->
	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="sidebar-heading">MATA LOMBA</div>
		<div class="list-group list-group-flush">
			@foreach($lomb as $l)
			<a href="/nilaipeserta/{{$l->id}}" class="list-group-item list-group-item-action bg-light">{{$l->mata_lomba}}</a>
			@endforeach

		</div>
	</div>
	<!-- /#sidebar-wrapper -->
	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<button class="btn btn-primary mt-3" id="menu-toggle">
				<i class="fa fa-align-left"></i> Menu
			</button>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<h1 class="mt-4">Halaman Nilai Peserta</h1>
			<p>Silahkan pilih nilai pada sidebar mata lomba untuk menampilkan nilai sesuai mata lomba yang anda inginkan.</p>
			
		</div>
	</div>
	<!-- /#page-content-wrapper -->
</div>
   

@endsection