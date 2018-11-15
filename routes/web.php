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
    return view('pages.home');
});

Route::get('/', 'Controller@home');
Route::get('infobox/{id}', 'HotelController@infobox');

Route::post('report/{id}/submit', 'HotelRequestController@store');
Route::get('report/{id}', 'HotelController@report');

Route::resource('admin/hotels', 'HotelController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brands', 'BrandController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brands.subbrands', 'SubbrandController', ['only' => ['create', 'update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brands.categories', 'CategoryController', ['only' => ['create', 'update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/requests', 'HotelRequestController', ['only' => ['update', 'show', 'store', 'destroy', 'index'] ]);

Route::get('admin/ajax/select', 'AjaxController@select');
Route::get('ajax/select', 'AjaxController@select');
Route::get('ajax/report/{id}', 'AjaxController@report');
Route::post('ajax/report/{id}/submit', 'AjaxController@store');

Route::get('admin/regenerate', 'Controller@regenerate');
Route::get('admin', function () {
    return view('pages.admin.overview');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');
