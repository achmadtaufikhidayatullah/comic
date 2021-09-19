@extends('layout/main')

@section('title','Hapus Peserta')
@section('peserta','active')

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
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Peserta</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_id">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Peserta</th>
									<th>Asal Sekolah</th>
									<th>Mata Lomba</th>
									<th width="200">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								@foreach($data as $peserta)
								<tr>
									<td>{{$nomor}}</td>
									<td>{{$peserta->nama_peserta}}</td>
									<td>{{$peserta->nama_sekolah}}</td>
									<td>{{$peserta->mata_lomba}}</td>
									<td>

										<form action="/pesertalomba/{{$peserta->id}}" method="post">
											@method('delete')
											@csrf
											<button class="btn btn-danger btn-sm pull-left" style="margin-right: 5px;" onclick="return confirm('Apakah yakin ingin menghapus?');"><i class="fa fa-trash-o"></i>Delete</button>
										</form>
									</td>
								</tr>
								<?php $nomor++; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection