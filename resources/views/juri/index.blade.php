@extends('layout/main')

@section('title','Juri')
@section('juri','active')

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
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Juri</h3>
					<a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" style="margin-top: -20px;">+ tambah data</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_id">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Juri</th>
									<th>Email</th>
									<th width="200">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								@foreach($juri as $juri)
								<tr>
									<td>{{$nomor}}</td>
									<td>{{$juri->nama_juri}}</td>
									<td>{{$juri->email}}</td>
									<td>
										<form action="/juri/{{$juri->id}}/edit" method="get">
											<button class="btn btn-success btn-sm pull-left" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Edit</button>
										</form>

										<form action="/juri/{{$juri->id}}" method="post">
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


<!-- Modal -->
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Tambah Juri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form action="/juri/store" method="post">
			@csrf
			<div class="form-group">
				<label for="nama_juri">Nama Juri</label>
				<input type="text" class="form-control @error('nama_juri') is-invalid @enderror" id="nama_juri" placeholder="Nama Juri" name="nama_juri" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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