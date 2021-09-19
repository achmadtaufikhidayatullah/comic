@extends('layout/main')

@section('title','Lomba')
@section('lomba','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Lomba</h3>
				</div>
				<div class="panel-body">
					<form action="/lomba/{{$lomba->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="mata_lomba">Mata Lomba</label>
							<input type="text" class="form-control @error('mata_lomba') is-invalid @enderror" id="mata_lomba" placeholder="Nama Peserta" name="mata_lomba" value="{{$lomba->mata_lomba}}" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						</div>

						<div class="form-group">
							<label for="id_tingkat">Tingkat</label>
							<br>
							<select class="form-control select2" name="id_tingkat" id="id_tingkat" style="width: 100%;" required>
								<option>----pilih tingkat----</option>
								<option value="0" @if( $lomba->id_tingkat == 0 ) selected @endif>All</option>
								<option value="1" @if( $lomba->id_tingkat == 1 ) selected @endif>SD/MI</option>
								<option value="2" @if( $lomba->id_tingkat == 2 ) selected @endif>SMP/MTS</option>
								<option value="3" @if( $lomba->id_tingkat == 3 ) selected @endif>SMA/MA</option>
					
					
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