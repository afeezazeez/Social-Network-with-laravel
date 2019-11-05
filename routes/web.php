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
    		return view('homepage');
		})->name('homepage');

		Route::get('/index', function () {
    		return view('dashboard');
		})->name('dashboard');


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
		Route::get('/index',[
			'uses' => 'PostController@getDashboard',
			'as' => 'index'
		]);




		Route::post('/createpost',[
			'uses' => 'PostController@postCreatePost',
			'as' => 'post.create'
		]);
 
		Route::get('/delete-post/{post_id}',[
			'uses' => 'PostController@getDeletePost',
			'as' => 'post.delete'
		]);


		Route::get('edit','PostController@getEdit')->name('edit');
		
		Route::get('/account',[
			'uses' => 'UserController@getAccount',
			'as' => 'account'
		]);


		Route::post('/updateaccount',[
			'uses' => 'UserController@postSaveAccount',
			'as' => 'account.save'
		]);
		
		Route::get('/userimage/{filename}',[
			'uses' => 'UserController@getUserImage',
			'as' => 'account.image'
		]);

		Route::get('like','PostController@getLikePost')->name('like');
		



	});
































Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

