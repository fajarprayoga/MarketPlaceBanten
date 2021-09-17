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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','SiteController@index');
Route::get('banten','SiteController@febanten')->name('fe.banten');
Route::get('banten/view/{banten_id}','SiteController@viewbanten')->name('fe.viewbanten');
Route::get('kalender','SiteController@fekalender')->name('fe.kalender');
Route::get('upakara','SiteController@feupakara')->name('fe.upakara');
Route::get('upakara/view/{upakara_id}','SiteController@viewupakara')->name('fe.viewupakara');

Route::get('pembeli/register','SiteController@feregister')->name('fe.register');
Route::post('pembeli/register','SiteController@postregister')->name('post.register');
Route::get('pembeli/logout','SiteController@logoutpembeli')->name('fe.logout');
Route::get('pembeli/loginform','SiteController@loginpembeli')->name('fe.loginform');
Route::get('pembeli/edit','SiteController@editpembeli')->name('fe.editpembeli');
Route::post('pembeli/login','SiteController@loginpembeli_auth')->name('fe.loginpembeli');
Route::get('fe/order/{banten_id?}/{pembeli?}','SiteController@feorder')->name('fe.order');
Route::post('fe/order','SiteController@fe_postorder')->name('fe.postorder');
Route::post('fe/order/uploadbukti','SiteController@upload_bukti')->name('fe.uploadbukti');
Route::post('fe/order/uploadbuktiperrow','SiteController@upload_bukti_perrow')->name('fe.uploadbuktiperrow');
Route::post('fe/setpendingdate','SiteController@setDateBanten')->name('fe.setpendingdate');





