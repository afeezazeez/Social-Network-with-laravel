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

	

	Route::group(['middleware' => 'web'], function(){
		Route::get('/', function () {
    		return view('welcome');
		})->name('welcome');

		Route::post('/signup',[
			'uses' => 'UserController@postsignUp',
			'as' => 'signup'
		]);

		Route::post('/signup',[
			'uses' => 'UserController@postsignUp',
			'as' => 'signup'
		]);

		Route::post('/signin',[
			'uses' => 'UserController@postsignIn',
			'as' => 'signin'
		]);

		Route::get('/logout',[
			'uses' => 'UserController@getLogout',
			'as' => 'logout'
		]);



		
	});


	Route::group(['middleware' => 'auth'], function(){
		Route::get('/dashboard',[
			'uses' => 'PostController@getDashboard',
			'as' => 'dashboard'
		]);

		Route::post('/createpost',[
			'uses' => 'PostController@postCreatePost',
			'as' => 'post.create'
		]);
 
		Route::get('/delete-post/{post_id}',[
			'uses' => 'PostController@getDeletePost',
			'as' => 'post.delete'
		]);


	});
































Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

