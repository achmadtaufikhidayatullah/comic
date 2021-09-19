@extends('layout/main')

@section('title','Juri Lomba')
@section('juri','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Juri Lomba</h3>
				</div>
				<div class="panel-body">
					<form action="/jurilomba/{{$juri->id}}/update" method="post">
						@csrf
						<input type="hidden" name="id" value="{{ $id_juri }}">
						<div class="form-group">
							<label for="nama_juri">Nama Juri</label>
							<input type="text" disabled="" class="form-control @error('nama_juri') is-invalid @enderror" id="nama_juri" placeholder="Nama Peserta" name="nama_juri" value="{{$juri->nama_juri}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
				
						<div class="form-group">
							<label for="id_lomba">Mata Lomba</label>
							<br>
							<select class="form-control select2 select2-container" name="id_lomba" id="id_lomba" style="width: 100%;">
								<option selected disabled>----pilih mata lomba----</option>
								@foreach($lomba as $row)
								<option value="{{$row->id}}" <?php if($id_lomba == $row->id) :?> selected <?php endif ?>	>{{$row->mata_lomba}}</option>
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