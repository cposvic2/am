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

Route::get('report/{id}', 'HotelController@report');

Route::get('infobox/{id}', 'HotelController@infobox');

Route::resource('admin/hotel', 'HotelController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brand', 'BrandController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brand.subbrand', 'SubbrandController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);
Route::resource('admin/brand.category', 'CategoryController', ['only' => ['update', 'edit', 'store', 'destroy', 'index'] ]);