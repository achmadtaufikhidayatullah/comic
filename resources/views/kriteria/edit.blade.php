@extends('layout/main')

@section('title','Kriteria')
@section('kriteria','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Peserta</h3>
				</div>
				<div class="panel-body">
					<form action="/kriteria/{{$kriteria->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="kriteria">Kriteria</label>
							<input type="text" class="form-control @error('kriteria') is-invalid @enderror" id="kriteria" placeholder="Kriteria" name="kriteria" value="{{$kriteria->kriteria}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>

						<div class="form-group">
							<label for="persentase">Persentase (%)</label>
							<input type="number" class="form-control @error('persentase') is-invalid @enderror" id="persentase" placeholder="Persentase" name="persentase" value="{{$kriteria->persentase}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>
				
						<div class="form-group">
							<label for="id_lomba">Mata Lomba</label>
							<br>
							<select class="form-control select2 select2-container" name="id_lomba" id="id_lomba" style="width: 100%;">
								<option selected disabled>----pilih mata lomba----</option>
								@foreach($lomba as $row)
								<option value="{{$row->id}}" <?php if($kriteria->id_lomba == $row->id) :?> selected <?php endif ?>	>{{$row->mata_lomba}}</option>
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