<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('tampilanuser','TampilanuserController');


Route::group(['middleware'=>['auth','role:admin|member']],function(){
	Route::resource('mobil','MobilController');
	Route::resource('supir','SupirController');
	Route::resource('laporan','LaporanController');
	Route::resource('rental','RentalController');
	Route::resource('kembali','KembaliController');
	Route::resource('back','BackController');
	Route::resource('tambah','TambahRental');
	Route::resource('edit','EditBackController');   	
  	
});
Route::group(['middleware'=>['auth','role:admin']],function(){
	Route::resource('user','UserController'); 	
});

//Admin
Route::group(['middleware'=>['auth']],function(){

Route::get('/rentall/{id}', 'MobilController@tambahrental');

Route::get('/backs/{id}', 'RentalController@creates');

Route::get('/detail/{id}', 'MobilController@detail');

Route::post('/pengembalian/rekap',[
	'uses'=>'BackController@downloadPDF',
	'as'=>'back/pdf',
]);

});

Route::group(['middleware'=>'cors'],function(){
	Route::get('/contoh','TestingController@api');
	Route::get('/listdata','ApiController@listdata');
});
