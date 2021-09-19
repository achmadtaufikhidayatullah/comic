@extends('layout/main')

@section('title','Penilaian')
@section('penilaian','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<!-- notif -->
			@if(session('status'))

			<div class="alert alert-success alert-dismissible"role="alert">
				{{ session('status') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<!-- /notif -->
			@if($status == 1)
			<h3 class="text-center">Penilaian telah selesai ! Terimakasih telah melakukan penilaian.</h3>
			<h5 class="text-center">Silahkan kembali ke penilaian. <a href="/nilai">Klik Disini</a></h5>
			@endif
			@if($status == 0)
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">{{$lomba->mata_lomba}}</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_nilai">
							<thead>
								<tr>
									<th rowspan="2" width="10">No</th>
									<th width="250" class="text-center" rowspan="2">Nama Peserta</th>
									<th class="text-center" colspan="{{count($kriteria)}}">Kriteria</th>
									<th class="text-center" rowspan="2">Aksi</th>
								</tr>
								<tr>
									@foreach( $kriteria as $k )
									<th class="text-center">{{$k->kriteria}} ({{$k->persentase}}%)</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@php $no = 1 @endphp
								@foreach( $peserta_clear as $pc )
								<tr>
									<td>{{ $no++ }}</td>
									<td class="text-center" >
									@foreach( $nilai_peserta as $n )
										@if($n->id == $pc)
											{{ $n->nama_peserta }}
										@break
										@endif
									@endforeach
									</td>
									@foreach( $kriteria as $k )
										@foreach( $nilai_peserta as $n )
											@if($pc == $n->id_pesertalomba)
												@if($k->id == $n->id_kriteria)
													<td class="text-center">
														{{ $n->nilai }}
													</td>
												@endif
											@endif
										@endforeach
									@endforeach
									<td>
										<button type="submit" class="btn btn-sm btn-secondary btn-disabled">Simpan</button>
									</td>
								</tr>
								@endforeach

								@foreach( $peserta as $p )
								<tr>
									<td>{{ $no++ }}</td>
									<td class="text-center" >{{ $p->nama_peserta }}</td>
									<form action="/nilai/store" method="post">
									@csrf
									<input type="hidden" name="id_pesertalomba" value="{{ $p->id }}">
									<input type="hidden" name="id_lomba" value="{{ $lomba->id }}">
									@foreach( $kriteria as $k )
									<td class="text-center">
										<input style="width: 100px;" type="number" min="0" max="100" name="{{$k->id}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
									</td>
									@endforeach
									<td>
										<button type="submit" class="btn btn-sm btn-success">Simpan</button>
									</td>
									</form>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>



@endsection