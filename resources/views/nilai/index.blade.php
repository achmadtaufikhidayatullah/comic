@extends('layout/main')

@section('tittle','Penilaian')
@section('penilaian','active')


@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<h3>Daftar Lomba yang Anda Ikuti </h1>
					</div>
				</div>
				<div class="panel-body">
					@foreach($lomba as $l)
						@foreach($jurilomba as $j)
							@if($j->id_lomba === $l->id)
								<div class="col-md-4">
									<a href="/nilai/{{$j->id_lomba}}">
										<div class="metric nav-hover">
											<span class="icon"><i class="fa fa-pencil"></i></span>
											<p>
												<span class="number">{{ $l->mata_lomba }}</span>
												<span class="title">
													@if($l->id_tingkat == 0) {{ '-' }}
													@else {{ $l->tingkat }}
													@endif
												</span>
											</p>
										</div>
									</a>
								</div>
							@endif
						@endforeach
					@endforeach
				</div>
				<hr>
				<div style="display: block;" class="box-footer">
					<p> Untuk informasi nilai , silahkan ke halaman depan melalui link ini : <a href="/nilaipeserta">Halaman Nilai</a></p>
				</div>
		</div>
		</div>
	</div>
</div>

@endsection