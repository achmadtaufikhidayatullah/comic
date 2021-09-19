@extends('layout/main')

@section('title','welcome')
@section('dashboard','active')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			
			<div class="callout callout-info">
				<h4 style="text-transform: capitalize;">Selamat Datang {{auth()->user()->level}}!</h4>
				<p>Untuk menggunakan aplikasi harap diperhatikan bagian-bagian data inti yang perlu dipersiapkan sebelumnya sebelum siap digunakan. </p>
			</div>
			
			<div class="box " >
            <div class="box-header with-border">
            @if( auth()->user()->level == 'juri')
              <h3 class="box-title">Penting !!</h3>
            @endif
            </div>
            <div style="display: block;" class="box-body">
            <!-- ADMIN -->
            @if( auth()->user()->level == 'admin')
            
            <div class="" id="chart" >
                
            </div>
            
            @endif
            <!-- JURI -->
            @if(auth()->user()->level == 'juri')
              Prosedur yang perlu diperhatikan dalam penggunaan aplikasi antara lain :
                <ol>
                <li>
                Mohon untuk memperhatikan arahan panitia pelombaan untuk alur pelaksanaan lomba.</li>

                <li>
                Pilih mata lomba pada menu di samping kiri sesuai dengan mata lomba yang di jalani.</li>

                <li>
                Pilih dan isi kolom peserta sesuai dengan nama peserta yang sedang tampil dan dinilai.</li>

                <li>                
                Setelah seluruh field dalam kolom peserta yang tampil terisi, langsung simpan hasil penilaian sebelum melakukan penilain pada peserta selanjutnya.</li>

                <li>
                lakukan sesuai tahapan hingga perlombaan selesai.</li>

                <li>
                Untuk nilai yang kosong, harap untuk diisi dengan 0 .</li>

                <li>
                Jika mengalami kesulitan, harap segera berkonsultasi kepada panitia perlombaan ditempat . </li>

                <li>
                Saat melakukan penilaian, juri di anjurkan menggunakan device dengan resolusi layar lebar seperti : PC , Laptop , Tab.</li>

                <li>
                Juri tidak diperbolehkan melakukan penilaian menggunakan SmartPhone untuk menjaga kenyamanan dan mengantisipasi kesalahan dalam proses penilaian. </li>

                <li>
                <strong>Ingat!!! lakukan penilaian secara adil, tanpa memberatkan salah satu pihak manapun.</strong></li>
                
                <li>
                <strong>Ingat berdo'a sebelum melakukan segala aktivitas kelola data, agar segala pekerjaan diperudah dan diperlancar oleh Allah SWT.</strong></li>
                
                </ol>
            @endif

            </div><!-- /.box-body -->
            <div style="display: block;" class="box-footer">
            @if(auth()->user()->level == 'juri')
              nb : Dalam proses ini sangat tergantung pada urutan proses.
            @endif
            @if(auth()->user()->level == 'admin')
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Total Data</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover " >
                            <thead>
                                <tr>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Peserta</td>
                                    <td class="text-center">{{$count_peserta}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Lomba</td>
                                    <td class="text-center">{{$count_lomba}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            </div><!-- /.box-footer-->
          </div>

		</div>
	</div>
	
</div>


@endsection

@section('footer')
<!-- HIGHTCHARTS -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Detai Jumlah Peserta COMIC Per-Mata Lomba'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Peserta'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Peserta',
        data:{!!json_encode($data)!!}

    }]
})
</script>
@endsection