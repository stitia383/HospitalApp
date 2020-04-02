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
    return redirect(route('login'));
});

Auth::routes();
Route::group(['middleware' => 'auth'], function (){

    Route::get('/kamar', 'InpatiensController@select_inap')->name('select_room');
    Route::group(['middleware' => ['Admin']], function(){
        Route::get('/dokter', 'DoctorController@index')->name('dokterindex');
        Route::get('/tambah', 'DoctorController@create')->name('doktercreate');
        Route::post('/store', 'DoctorController@store')->name('dokterstore');
        Route::delete('/delete/{id}', 'DoctorController@destroy')->name('dokterdelete');
        Route::get('/{id}/edit', 'DoctorController@edit')->name('dokteredit');
        Route::post('/{id}/update', 'DoctorController@update')->name('dokterupdate');

        Route::resource('/tipedokter', 'DoctortypeController')->except([
            'create', 'show']);

        Route::resource('/perawat', 'NurseController');
    });


    Route::group(['middleware' => ['Perawat']], function(){
        Route::get('/pasien', 'PatientController@index')->name('pasienindex');
        Route::post('/tambahpasien', 'PatientController@store')->name('pasienstore');
        Route::delete('/{id}/destroy', 'PatientController@destroy')->name('pasiendestroy');
        Route::get('/{id}/editpasien', 'PatientController@edit')->name('pasienedit');
        Route::put('/{id}/updatepasien', 'PatientController@update')->name('pasienupdate');
});

    Route::group(['middleware' => ['adminOrDokter']], function(){
        Route::resource('/perawat', 'NurseController');
    });

    Route::group(['middleware' => ['dokterOrPerawat']], function(){
        Route::resource('/riwayatpasien', 'HistoryController');
        Route::resource('/rawatinap', 'InpatiensController');

    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index');
});










