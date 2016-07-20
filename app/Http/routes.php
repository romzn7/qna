<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
			Route::get('/', [
		    'as' => 'home', 'uses' => 'question\QuestionController@getIndex'
			]);

			Route::get('/register', [
			    'as' => 'register', 'uses' => 'users\UsersController@getCreate'
			]);

			Route::post('/register', [
			    'as' => 'register', 'uses' => 'users\UsersController@postStore'
			]);

			Route::get('/login', [
			    'as' => 'login', 'uses' => 'users\UsersController@getLogin'
			]);

			Route::post('/login', [
			    'as' => 'login', 'uses' => 'users\UsersController@postLogin'
			]);

			Route::get('/logout', [
				'as' => 'logout', 'uses' => 'users\UsersController@getLogout'
			]);
	
			Route::get('/question/{id}', [
				'as' => 'question', 'uses' => 'question\QuestionController@getSingleQuestion'
			]);

			Route::group([ 'middleware' => 'auth'], function () {
				Route::post('/ask', [
					'as' => 'ask', 'uses' => 'question\QuestionController@postQuestion'
				]);

				Route::get('your-questions', [
					'as' => 'your-questions', 'uses' => 'question\QuestionController@getYourQuestion'
				]);

				Route::get('/{id}/edit', [
					'as' => 'edit', 'uses' => 'question\QuestionController@getEditQuestion'
				]);

				Route::post('/edit', [
					'as' => 'edited', 'uses' => 'question\QuestionController@postEditQuestion'
				]);

				Route::post('answer',[
					'as' => 'answer', 'uses' => 'answer\AnswerController@postAnswerSubmit'
				]);

			});


});



