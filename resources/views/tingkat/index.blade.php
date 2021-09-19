@extends('layout/main')

@section('title','Tingkat')
@section('tingkat','active')

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
					<h3 class="panel-title">Daftar Tingkat</h3>
					<a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" style="margin-top: -20px;">+ tambah data</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="table_id">
							<thead>
								<tr>
									<th>No</th>
									<th width="350" class="text-center">Tingkat</th>
									<th class="text-center" >Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								@foreach($tingkat as $tingkat)
								<tr>
									<td class="text-center">{{$nomor}}</td>
									<td class="text-center">{{$tingkat->tingkat}}</td>
									<td>
										<form action="/tingkat/{{$tingkat->id}}/edit" method="get">	
											<button class="btn btn-success btn-sm pull-left" style="margin-right: 5px; margin-left: 200px;"><i class="fa fa-pencil"></i> Edit</button>
										</form>

										<form action="/tingkat/{{$tingkat->id}}" method="post">
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
        <h5 class="modal-title" id="modal-label">Tambah Tingkat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form action="/tingkat/store" method="post">
			@csrf
			<div class="form-group">
				<label for="tingkat">Tingkat</label>
				<input type="text" class="form-control" id="tingkat" placeholder="Mata Lomba" name="tingkat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
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