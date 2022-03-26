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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'],function(){
	Route::group(['middleware' => ['role:Admin']], function () {
		Route::get('quize','Admin\QuizContoller@index')->name('quize.index');
		Route::get('quize/create','Admin\QuizContoller@create')->name('quize.create');
		Route::get('quize/{id}/edit','Admin\QuizContoller@edit')->name('quize.edit');
		Route::get('quize/{id}/chooseAnswer','Admin\QuizContoller@chooseAnswer')->name('quize.chhose.ans');
		Route::Post('quize/chooseAnswer/store','Admin\QuizContoller@answerstore')->name('quize.store.ans');
		Route::Post('quize/store','Admin\QuizContoller@store')->name('quize.store');
		Route::Post('quize/update/{id}','Admin\QuizContoller@update')->name('quize.update');
		Route::Post('quize/delete','Admin\QuizContoller@destroy')->name('quize.delete');
	});
	Route::group(['middleware' => ['role:Quiz']], function () {
		Route::get('take-quize','User\QuizeContoller@index')->name('take.quize');
		Route::Post('take-quize/submit','User\QuizeContoller@store')->name('quize.submit');
		
	});
	
});
