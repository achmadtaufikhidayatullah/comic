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
			<h1 class="mt-4">{{$lomba->mata_lomba}}</h1>
			<div class="table-responsive-sm">
				<table class="table-sm table-bordered bg-light">
					<thead>
						<tr>
							<th rowspan="2">No</th>
							<th width="250" class="text-center" rowspan="2">Nama Peserta</th>
							<th class="text-center" colspan="{{count($kriteria)}}">Kriteria</th>
							<th class="text-center" rowspan="2">Total</th>
						</tr>
						<tr>
							@foreach( $kriteria as $k )
							<th class="text-center">{{$k->kriteria}} ({{$k->persentase}}%)</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						@php $no = 1; $colspan = 0 @endphp
						@foreach( $peserta as $p )
						<tr>
							<td>{{ $no++ }}</td>
							<td class="text-center" >{{ $p->nama_peserta }}</td>
							@foreach( $kriteria as $k )
								@if( count($nilai_peserta) > 0 )
									@foreach( $nilai_kriteria as $key => $n )
										@if($p->id == $key)
											@foreach($n as $nk => $v)
												@if($k->id == $nk)
													<td class="text-center">
														{{ round($v,2) }}
													</td>
												@else
													@php $colspan++ @endphp
												@endif
											@endforeach
										@endif
									@endforeach
								@else
									<td class="text-center">
										0
									</td>
								@endif
							@endforeach
							<td colspan="{{ $colspan }}" class="text-right">{{ round($p->total,2) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<p class="mt-3">NB : Data sudah di urutkan sesuai dengan perolehan nilai total tertinggi. jika terdapat nilai total yang sama , posisi akan di tentukan dari perolehan tertinggi pada nilai kriteria dengan bobot persentase tertinggi</p>
		</div>
	</div>
	<!-- /#page-content-wrapper -->
</div>
   

@endsection