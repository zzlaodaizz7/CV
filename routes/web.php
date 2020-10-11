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
//     return view('home');
// });
Route::resource("/","Frontend\HomeController");
Auth::routes();
Route::get('test', 'TestController@index');
//Route::prefix('admin')->group(function () {
	Route::middleware('auth')->group(function () {
		Route::resource('/home', 'Backend\HomeController');
		Route::resource('/cv','Backend\CvController');
		Route::resource('/timeinterview','Backend\TimeInterviewController');
		Route::post('/updatestatus','Backend\CvController@updateStatus');
		Route::post('/deletetag','Backend\CvController@deleteTag');
		Route::resource('/job','Backend\JobController');
		Route::resource('/overview','Backend\OverviewController');
	});
//});
