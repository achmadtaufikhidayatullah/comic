@extends('layout/main')

@section('title','Peserta')
@section('peserta','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Peserta</h3>
				</div>
				<div class="panel-body">
					<form action="/peserta/{{$peserta->id}}/update" method="post">
						@csrf
						<input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="id_pesertalomba" placeholder="Nama Peserta" name="id_pesertalomba" value="{{$p}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<div class="form-group">
							<label for="nama_peserta">Nama Peserta</label>
							<input type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="nama_peserta" placeholder="Nama Peserta" name="nama_peserta" value="{{$peserta->nama_peserta}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
				

						<div class="form-group">
							<label for="id_sekolah">Asal Sekolah</label>
							<br>
							<select class="form-control select2" name="id_sekolah" id="id_sekolah" style="width: 100%;" required>
								<option selected disabled>----pilih sekolah----</option>
								@foreach($sekolah as $row)
								<option value="{{$row->id}}" <?php if($peserta->id_sekolah == $row->id) :?> selected <?php endif ?>>{{$row->nama_sekolah}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="id_matalomba">Mata Lomba</label>
							<br>
							<select class="form-control select2 select2-container" name="id_matalomba" id="id_matalomba" style="width: 100%;">
								<option selected disabled>----pilih mata lomba----</option>
								@foreach($lomba as $row)
								<option value="{{$row->id}}" <?php if($peserta_lomba->id_lomba == $row->id) :?> selected <?php endif ?>	>{{$row->mata_lomba}}</option>
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