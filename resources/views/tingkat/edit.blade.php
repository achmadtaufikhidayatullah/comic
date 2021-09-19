@extends('layout/main')

@section('title','Tingkat')
@section('tingkat','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Tingkat</h3>
				</div>
				<div class="panel-body">
					<form action="/tingkat/{{$tingkat->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="tingkat">Tingkat</label>
							<input type="text" class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" value="{{$tingkat->tingkat}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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