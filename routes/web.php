<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::resource('admin/events', 'Back\EventController');
Route::resource('admin/meqaleler', 'Back\ArticleController');
Route::get('admin/articledelete/{id}','Back\ArticleController@delete')->name('delete.article');
Route::get('admin/panel','Back\Dashboard@index')->name('admin.dashboard');
Route::get('admin/login' ,'Back\AuthController@login')->name('admin.login');
Route::post('admin/login', 'Back\AuthController@loginPost')->name('admin.login.post');
Route::get('admin/logout', 'Back\AuthController@logout')->name('admin.logout');



/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/','Front\Homepage@index')->name('homepage');
Route::get('/elaqe','Front\homepage@contact')->name('contact');
Route::get('kateqoriya/{category}','Front\Homepage@category')->name('category');
Route::post('/elaqe','Front\Homepage@contactpost')->name('contact.post');
Route::get('/{category}/{slug}','Front\Homepage@single')->name('single');
Route::get('/{slug}','Front\homepage@page')->name('page');
