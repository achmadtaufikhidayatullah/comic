@extends('layout/main')

@section('title','Peserta')
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
					<a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" style="margin-top: -20px;">+ tambah peserta baru</a>
					<a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create_pesertalomba" style="margin-top: -20px; margin-right: 10px;">+ peserta lomba </a>
				</div>
				<div class="dropdown" style="margin-bottom: 10px; margin-left: 25px;">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Filter Lomba
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style=" overflow-y: scroll; max-height: 300px; ">
							@foreach($list_lomba as $list_lomba)
								<li><a href="/peserta/{{$list_lomba->id}}">{{$list_lomba->mata_lomba}}</a></li>
							@endforeach
						</ul>
					</div>
				<div class="panel-body">
					<div class="table-responsive">
						<p><strong>Catatan : </strong>Jika ingin menghapus hanya peserta lomba saja. silahkan pilih menu hapus peserta lomba.</p>
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
										<form action="/peserta/{{$peserta->id}}/edit" method="get">
											<button class="btn btn-success btn-sm pull-left" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Edit</button>
										</form>

										<form action="/peserta/{{$peserta->id}}" method="post">
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
        <h5 class="modal-title" id="modal-label">Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form action="/peserta/store" method="post">
			@csrf
			<div class="form-group">
				<label for="nama_peserta">Nama Peserta</label>
				<input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="nama_peserta" placeholder="Nama Peserta" name="nama_peserta" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">
				<label for="id_sekolah">Asal Sekolah</label>
				<br>
				<select class="form-control select2" name="id_sekolah" id="id_sekolah" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
					<option selected disabled>----pilih sekolah----</option>
					@foreach($sekolah as $row)
					<option value="{{$row->id}}">{{$row->nama_sekolah}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="id_matalomba">Mata Lomba</label>
				<br>
				<select class="form-control select2" name="id_matalomba" id="id_matalomba1" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
					<option selected disabled>----pilih mata lomba----</option>
					@foreach($lomba as $lomba)
					<option value="{{$lomba->id}}">{{$lomba->mata_lomba}}</option>
					@endforeach
				</select>
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

<!-- Modal peserta lomba-->
<div class="modal fade" id="create_pesertalomba" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Tambah Peserta Lomba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form action="/pesertalomba/store" method="post">
			@csrf
			<div class="form-group">
				<label for="nama_peserta">Nama Peserta</label>
				<select class="form-control select2" name="id_peserta" id="id_peserta" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
					<option selected disabled>----pilih peserta----</option>
					@foreach($peserta_saja as $peserta)
					<option value="{{$peserta->id}}">{{$peserta->nama_peserta}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="id_matalomba">Mata Lomba</label>
				<br>
				<select class="form-control select2 select2-container" name="id_matalomba" id="id_matalomba" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
					<option selected disabled>----pilih mata lomba----</option>
					@foreach($lomba2 as $lomba)
					<option value="{{$lomba->id}}">{{$lomba->mata_lomba}}</option>
					@endforeach
				</select>
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