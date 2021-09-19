@extends('layout/main')

@section('title','Master Smartphone')
@section('master','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Smartphone</h3>
				</div>
				<div class="panel-body">
					<form action="/master/{{$master->id}}/update" method="post">
						@csrf
						<div class="form-group">
							<label for="seri">Seri Smartphone</label>
							<input type="text" class="form-control @error('seri') is-invalid @enderror" id="seri" placeholder="Seri Smartphone" name="seri" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{$master->seri}}">
						</div>
						<div class="form-group">
							<label for="merk">Merk Smartphone</label>
							<br>
							<select class="form-control select2" name="merk" id="merk" style="width: 100%;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
								<option selected disabled>----pilih merk----</option>
								<option value="Samsung" <?php if($master->merk == 'Samsung') :?> selected <?php endif ?>>Samsung</option>
								<option value="Xiaomi"  <?php if($master->merk == 'Xiaomi') :?> selected <?php endif ?>>Xiaomi</option>
								<option value="Iphone"  <?php if($master->merk == 'Iphone') :?> selected <?php endif ?>>Iphone</option>
								<option value="Oppo"  <?php if($master->merk == 'Oppo') :?> selected <?php endif ?>>Oppo</option>
								<option value="Vivo"  <?php if($master->merk == 'Vivo') :?> selected <?php endif ?>>Vivo</option>
								<option value="Huawei"  <?php if($master->merk == 'Huawei') :?> selected <?php endif ?>>Huawei</option>
							</select>
						</div>

						<div class="form-group">
							<label for="layar">Ukuran Layar (Inc)</label>
							<input type="number" class="form-control @error('layar') is-invalid @enderror" id="layar" placeholder="Ukuran layar Smartphone" name="layar" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{$master->layar}}">
						</div>

						<div class="form-group">
							<label for="Kamera_depan">Kamera Depan (Mp)</label>
							<input type="number" class="form-control @error('Kamera_depan') is-invalid @enderror" id="Kamera_depan" placeholder="Kamera_depan Smartphone" name="kamera_depan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{$master->kamera_depan}}">
						</div>

						<div class="form-group">
							<label for="kamera_belakang">Kamera Belakang (Mp)</label>
							<input type="number" class="form-control @error('kamera_belakang') is-invalid @enderror" id="kamera_belakang" placeholder="kamera_belakang Smartphone" name="kamera_belakang" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{$master->kamera_belakang}}">
						</div>
						
						<div class="form-group">
							<label for="tanggal">Tanggal Launching</label>
							<input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"  name="tanggal" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{$master->tanggal}}">
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