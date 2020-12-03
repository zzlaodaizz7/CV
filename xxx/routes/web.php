<?php

use Illuminate\Support\Facades\Route;

Route::resource("/", "Frontend\HomeController");
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();
Route::get('test', 'TestController@index');
//Route::prefix('admin')->group(function () {
Route::middleware('auth')->group(function () {
    Route::resource('/home', 'Backend\HomeController', [
        'name' => [
            'index' => 'home.index'
        ]
    ]);
    Route::resource('/cv', 'Backend\CvController');
    Route::resource('/timeinterview', 'Backend\TimeInterviewController');
    Route::post('/updatestatus', 'Backend\CvController@updateStatus');
    Route::post('/deletetag', 'Backend\CvController@deleteTag');
    Route::resource('/job', 'Backend\JobController');
    Route::resource('/overview', 'Backend\OverviewController');
    Route::resource('/tag', 'Backend\TagController');
});
//});
