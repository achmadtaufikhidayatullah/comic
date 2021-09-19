<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#left{
			background: url('../../public/img/logo-comic.png') no-repeat;
			width: 100px;
			height: 100px;
		}

		#right{
			background: url('../../public/img/logo-mcos.png') no-repeat;
			width: 100px;
			height: 100px;
		}
	</style>
</head>
<body>
<div>
	<div style="float: left; " id="left">
		
	</div>

	<div style="float: left; margin-right: 5px; margin-left: 5px; margin-top: -20px;">
		<h3 style="font-weight: bold;">UNIT KEGIATAN MAHASISWA MOSLEM COMMUNITY</h3>
		<h3 style="font-weight: bold; margin-left: 130px; ">OF STIKOM BALI (MCOS)</h3>
		<h3 style="font-weight: bold; margin-left: 10px;">COMPETITION OF ISLAMIC CREATIVITY (COMIC)</h3>
	</div>

	<div style="float: left;" id="right">
		
	</div>



</div>
<br><br><br><br><br>
<hr>
<div>
<h3 style="text-align: center;">{{$lomba->mata_lomba}}  </h3>
<table class="table " border="2" cellspacing="0">
	<thead>
		<tr>
			<th rowspan="2">No</th>
			<th class="text-center" rowspan="2">Nama Peserta</th>
			<th class="text-center" rowspan="2">Asal Sekolah</th>
			<th  colspan="{{count($kriteria)}}">Kriteria</th>
			<th  rowspan="2">Total</th>
		</tr>
		<tr>
			@foreach( $kriteria as $k )
			<th >{{$k->kriteria}} ({{$k->persentase}}%)</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@php $no = 1 @endphp
		@foreach( $peserta_lomba as $p )
		<tr>
			<td style="text-align: center;">{{ $no++ }}</td>
			<td style="text-align: center;">{{ $p->nama_peserta}}</td>
			@foreach( $peserta as $ps)
			@if( $ps->id == $p->id_peserta)
			<td style="text-align: center;" >{{$ps->nama_sekolah}}</td>
			@endif
			@endforeach
			@foreach( $kriteria as $k )
			@if( count($nilai_peserta) > 0 )
			@foreach( $nilai_kriteria as $key => $n )
			@if($p->id == $key)
			@foreach($n as $nk => $v)
			@if($k->id == $nk)
			<td style="text-align: center;">
				{{ round($v,2) }}
			</td>
			@endif
			@endforeach
			@endif
			@endforeach
			@else
			<td style="text-align: center;">
				0
			</td>
			@endif
			@endforeach
			<td style="text-align: center;">{{ round($p->total,2) }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
<div style="display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -100px;">
	@foreach($namajuri as $nj)
	<div style=" float: left; -ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%; margin-right: 400px;"><!-- Col-6 -->
	<p style="text-align: center !important;">Juri</p>
	<br>
	<br>
	<p style="text-align: center !important;">{{$nj}}</p>
</div>
@endforeach
</div>
</div>
</body>
</html>