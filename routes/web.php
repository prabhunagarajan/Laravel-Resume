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


Route::get('/', 'App\Http\Controllers\resumeController@create');
Route::post('resume', 'App\Http\Controllers\resumeController@store');
Route::get('form', 'App\Http\Controllers\resumeController@create');
Route::get('checkemail','App\Http\Controllers\resumeController@checkEmail');
Route::get('table', 'App\Http\Controllers\resumeController@Table');
Route::get('{id}/view', 'App\Http\Controllers\resumeController@view');
Route::get('{id}/delete','App\Http\Controllers\resumeController@delete');