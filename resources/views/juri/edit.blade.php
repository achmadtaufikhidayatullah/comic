@extends('layout/main')

@section('title','Lomba')
@section('juri','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Juri</h3>
				</div>
				<div class="panel-body">
					<form action="/juri/{{$juri->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="nama_juri">Nama Juri</label>
							<input type="text" class="form-control @error('nama_juri') is-invalid @enderror" id="nama_juri" placeholder="Nama Peserta" name="nama_juri" value="{{$juri->nama_juri}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>

						<div class="form-group">
							<label for="email">email</label>
							<input type="email" disabled="" class="form-control disabled @error('email') is-invalid @enderror" id="email" placeholder="Nama Peserta" name="email" value="{{$user->email}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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