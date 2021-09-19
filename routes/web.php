<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//User Interface
Route::get('/', function(){
	return view('user/welcome');
});

Route::get('/rundown', function(){
	return view('user/rundown/rundownacara');
});

Route::get('/denahacara', function(){
	return view('user/denah/denahacara');
});

Route::get('/denahregist', function(){
	return view('user/denah/denahregist');
});

Route::get('/denahlomba', function(){
	return view('user/denah/denahlomba');
});

Route::get('/about', function(){
	return view('user/about');
});

//nilai peserta
Route::get('/nilaipeserta','TampilNilaiController@index');
Route::get('/nilaipeserta/{id}','TampilNilaiController@show');





//login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','CheckRole:juri,admin']], function(){
	Route::get('/dashboard','DashboardController@index');
});

Route::group(['middleware' => ['auth','CheckRole:admin']], function(){

	// peserta
	Route::get('/peserta','PesertaControllers@index');
	Route::get('/peserta/{peserta}','PesertaControllers@show');
	Route::post('/peserta/store','PesertaControllers@store');
	Route::get('/peserta/{peserta}/edit','PesertaControllers@edit');
	Route::post('/peserta/{peserta}/update','PesertaControllers@update');
	Route::delete('/peserta/{peserta}', 'PesertaControllers@destroy');
	// Route::resource('peserta', 'PesertaControllers');

	//peserta_lomba
	Route::get('/pesertalomba','PesertaLombaController@index');
	Route::post('/pesertalomba/store','PesertaLombaController@store');
	Route::delete('/pesertalomba/{peserta}', 'PesertaLombaController@destroy');


	// sekolah
	Route::get('/sekolah','SekolahControllers@index');
	Route::post('/sekolah/store','SekolahControllers@store');
	Route::get('/sekolah/{sekolah}/edit','SekolahControllers@edit');
	Route::post('/sekolah/{sekolah}/update', 'SekolahControllers@update');
	Route::delete('/sekolah/{sekolah}', 'SekolahControllers@destroy');

	//lomba
	Route::get('/lomba','LombaControllers@index');
	Route::post('/lomba/store','LombaControllers@store');
	Route::get('/lomba/{lomba}/edit', 'LombaControllers@edit');
	Route::post('/lomba/{lomba}/update', 'LombaControllers@update');
	Route::delete('/lomba/{lomba}', 'LombaControllers@destroy');

	//juri
	Route::get('/juri','JuriController@index');
	Route::post('/juri/store','JuriController@store');
	Route::get('juri/{juri}/edit','JuriController@edit');
	Route::post('juri/{juri}/update','JuriController@update');
	Route::delete('juri/{juri}','JuriController@destroy');

	// jurilomba
	Route::get('/jurilomba','JuriController@jurilomba');
	Route::post('/jurilomba/store','JuriController@jurilombastore');
	Route::get('jurilomba/{juri}/edit','JuriController@editjurilomba');
	Route::post('jurilomba/{juri}/update','JuriController@updatejurilomba');
	Route::delete('jurilomba/{juri}','JuriController@destroyjurilomba');

	//kriteria
	Route::get('/kriteria','KriteriaController@index');
	Route::post('/kriteria/store','KriteriaController@store');
	Route::get('/kriteria/{kriteria}/edit','KriteriaController@edit');
	Route::post('/kriteria/{kriteria}/update','KriteriaController@update');
	Route::delete('/kriteria/{kriteria}','KriteriaController@destroy');

	//tingkat
	Route::get('/tingkat','TingkatController@index');
	Route::post('/tingkat/store','TingkatController@store');
	Route::get('/tingkat/{tingkat}/edit','TingkatController@edit');
	Route::post('/tingkat/{tingkat}/update','TingkatController@update');
	Route::delete('/tingkat/{tingkat}','TingkatController@destroy');

	//nilai
	Route::get('/adminnilai','AdminNilaiController@index');
	Route::get('/adminnilai/{id}','AdminNilaiController@show');
	Route::get('/adminnilai/{id}/print','AdminNilaiController@print');

	//master
	Route::get('/master','masterController@index');
	Route::post('/master/store','masterController@store');
	Route::get('/master/{master}/edit','masterController@edit');
	Route::post('/master/{master}/update','masterController@update');
	Route::delete('/master/{master}','masterController@destroy');
});

Route::group(['middleware' => ['auth','CheckRole:juri']], function(){
	// Route::get('/', function () {
 //    	return view('welcome');
	// });


	//nilai
	Route::get('/nilai','NilaiController@index');
	Route::get('/nilai/{nilai}','NilaiController@show');
	Route::post('/nilai/store','NilaiController@store');

});
