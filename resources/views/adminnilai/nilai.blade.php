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
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">{{$lomba->mata_lomba}}</h3>
					<a href="/adminnilai/{{$lomba->id}}/print" class="btn btn-primary pull-right"  style="margin-top: -20px;"><i class="lnr lnr-printer"> </i>Print</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_id">
							<thead>
								<tr>
									<th rowspan="2">No</th>
									<th width="250" class="text-center" rowspan="2">Nama Peserta</th>
									<th width="250" class="text-center" rowspan="2">Asal Sekolah</th>
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
								@php $no = 1 @endphp
								@foreach( $peserta_lomba as $p )
								<tr>
									<td>{{ $no++ }}</td>
									<td class="text-center" >{{ $p->nama_peserta}}</td>
									@foreach( $peserta as $ps)
										@if( $ps->id == $p->id_peserta)
											<td class="text-center" >{{$ps->nama_sekolah}}</td>
										@endif
									@endforeach
									@foreach( $kriteria as $k )
									@if( count($nilai_peserta) > 0 )
									@foreach( $nilai_kriteria as $key => $n )
									@if($p->id == $key)
									@foreach($n as $nk => $v)
									@if($k->id == $nk)
									<td class="text-center">
										{{ round($v,2) }}
									</td>
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
									<td>{{ round($p->total,2) }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<p class="mt-3">NB : Data sudah di urutkan sesuai dengan perolehan nilai total tertinggi. jika terdapat nilai total yang sama , posisi akan di tentukan dari perolehan tertinggi pada nilai kriteria dengan bobot persentase tertinggi</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection