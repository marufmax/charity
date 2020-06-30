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
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/causes', 'CausesController@index');
Route::get('/causes/{slug}', 'CausesController@show');
Route::post('/causes/{slug}', 'CausesController@store')->name('store-payment');

Route::group(['middleware' => 'auth'], function () {

    // Causes Routes

    Route::get('/admin/dashboard', 'Admin\AdminDashboardController@index')->name('admin.dashboard');
    Route::get('/donors/dashboard', 'Donors\DonorDashboardController@index')->name('donor.dashboard');
    Route::get('/admin/causes', 'Admin\AdminCausesController@index');
    Route::get('/admin/causes/add', 'Admin\AdminCausesController@create');
    Route::post('/admin/causes/add', 'Admin\AdminCausesController@store');
    Route::delete('/admin/causes/{causes}', 'Admin\AdminCausesController@destroy');

    // Donors

    Route::get('/admin/donors', 'Admin\AdminDonorController@index');
    Route::delete('/admin/donors/{donor}', 'Admin\AdminDonorController@destroy')
        ->name('admin.donors.delete');

});

