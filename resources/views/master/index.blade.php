@extends('layout/main')

@section('title','Master Smartphone')
@section('master','active')

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
					<h3 class="panel-title">Daftar Smartphone</h3>
					<a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" style="margin-top: -20px;">+ tambah smartphone</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_id">
							<thead>
								<tr>
									<th>Kode Smartphone</th>
									<th>Seri Smartphon</th>
									<th>Merk Smartphone</th>
									<th>Ukuran Layar (Inc)</th>
									<th>Kamera Depan (Mp)</th>
									<th>Kamera Belakang (Mp)</th>
									<th>Tanggal Launching</th>
									<th width="190">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								@foreach($master as $master)
								<tr>
									<td>{{$master->id}}</td>
									<td>{{$master->seri}}</td>
									<td>{{$master->merk}}</td>
									<td>{{$master->layar}}</td>
									<td>{{$master->kamera_depan}}</td>
									<td>{{$master->kamera_belakang}}</td>
									<td>{{$master->tanggal}}</td>
									<td>
										<form action="/master/{{$master->id}}/edit" method="get">
											<button class="btn btn-success btn-sm pull-left" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Edit</button>
										</form>

										<form action="/master/{{$master->id}}" method="post">
											@method('delete')
											@csrf
											<button class="btn btn-danger btn-sm pull-left" style="margin-right: 5px;" onclick="return confirm('Apakah yakin ingin menghapus?');"><i class="fa fa-trash-o"></i> Delete</button>
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


<!-- Modal peserta baru-->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Tambah Smartphone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form action="/master/store" method="post">
			@csrf
			<div class="form-group">
				<label for="seri">Seri Smartphone</label>
				<input type="text" class="form-control @error('seri') is-invalid @enderror" id="seri" placeholder="Seri Smartphone" name="seri" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">
				<label for="merk">Merk Smartphone</label>
				<br>
				<select class="form-control select2" name="merk" id="merk" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
					<option selected disabled>----pilih merk----</option>
					<option value="Samsung">Samsung</option>
					<option value="Xiaomi">Xiaomi</option>
					<option value="Iphone">Iphone</option>
					<option value="Oppo">Oppo</option>
					<option value="Vivo">Vivo</option>
					<option value="Huawei">Huawei</option>
				</select>
			</div>
			<div class="form-group">
				<label for="layar">Ukuran Layar (Inc)</label>
				<input type="number" class="form-control @error('layar') is-invalid @enderror" id="layar" placeholder="Ukuran layar Smartphone" name="layar" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>

			<div class="form-group">
				<label for="Kamera_depan">Kamera Depan (Mp)</label>
				<input type="number" class="form-control @error('Kamera_depan') is-invalid @enderror" id="Kamera_depan" placeholder="Kamera_depan Smartphone" name="kamera_depan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>

			<div class="form-group">
				<label for="kamera_belakang">Kamera Belakang (Mp)</label>
				<input type="number" class="form-control @error('kamera_belakang') is-invalid @enderror" id="kamera_belakang" placeholder="kamera_belakang Smartphone" name="kamera_belakang" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			
			<div class="form-group">
				<label for="tanggal">Tanggal Launching</label>
				<input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"  name="tanggal" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
		</form>
      </div>
    </div>
  </div>
</div>



@endsection