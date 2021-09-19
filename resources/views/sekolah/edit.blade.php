@extends('layout/main')

@section('title','Sekolah')
@section('sekolah','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Sekolah</h3>
				</div>
				<div class="panel-body">
					<form action="/sekolah/{{$sekolah->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="nama_sekolah">Nama Sekolah</label>
							<input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" placeholder="Nama Peserta" name="nama_sekolah" value="{{$sekolah->nama_sekolah}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
				

						<div class="form-group">
							<label for="id_tingkat">Tingkat</label>
							<br>
							<select class="form-control select2" name="id_tingkat" id="id_tingkat" style="width: 100%;" required>
								<option selected disabled>----pilih sekolah----</option>
								@foreach($tingkat as $row)
								<option value="{{$row->id}}" <?php if($sekolah->id_tingkat == $row->id) :?> selected <?php endif ?>>{{$row->tingkat}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection