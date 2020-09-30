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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'StudentController@index')->name('all.student');
Route::get('/add', 'StudentController@Add')->name('add.student');
Route::post('/store', 'StudentController@Store')->name('store.student');  
Route::get('student/edit/{id}','StudentController@Edit');  
Route::post('student/store/{id}','StudentController@Update');   
Route::get('student/softDelete/{id}','StudentController@SoftDelete');
Route::get('delete/student/{id}','StudentController@PermanentDelete');
Route::get('restore/student/{id}','StudentController@Restore');
