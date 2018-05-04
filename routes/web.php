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

Route::get('/hello', function (){
	return "Hello World";
});

// Route::get('/articles', function (){
// 	$article1 = 'Tutorial';
// 	$article2 = 'Getting started';
// 	return view('articles.articles_list', compact('article1', 'article2'));
// });

// Route::get('/iftest', function(){
// 	$var1 = 3;
// 	$var2 = 5;
// 	return view('iftest', compact('var1','var2'));
// });

// Route::get('/articles',
// 	'ArticlesController@getArticles'); Select table

// Route::get('/iftest',
// 	'ArticlesController@showIftest');

// Route::get('/insert',
// 	'ArticlesController@insertArticles');

// Route::get('/articles',
// 	'ArticlesController@updateArticles'); 

// Route::get('/articles',
// 	'ArticlesController@deleteArticles'); Delete

Route::get('/articles',
	'ArticlesController@showArticles');

Route::get('/articles/create',
	'ArticlesController@create');

Route::group(['middleware' => 'is.admin'], function(){

	
});

Route::get('/articles/{id}',
	'ArticlesController@show');

Route::post('/articles/create',
	'ArticlesController@store');

Route::get('/articles/{id}/delete',
	'ArticlesController@delete');

Route::get('/articles/{id}/update',
	'ArticlesController@update');

Route::post('/articles/{id}/updateArticles',
	'ArticlesController@updateArticles');

Route::get('/uploadimg',
'ArticlesController@index');

Route::post('/imageupload',
	'ArticlesController@imageupload')->name('imageupload');


Route::post('/setpreference',
	'ArticlesController@setPreference');

Route::post('/articles/{id}',
	'ArticlesController@postComment');

Route::get('/articles/{id}/deleteComment',
	'ArticlesController@deleteComment');

Route::get('/uploadfile', 'UploadFileController@index');
Route::post('/uploadfile', 'UploadFileController@showUploadFile');

;
Route::get('/dashboard', function () {
    return 'hellow world';
});

Route::get('/profile/{id}/changepassword',
	'UserController@showChangePasswordForm');

Route::post('/profile/{id}/updatePassword','UserController@updatePassword')->name('changePassword');

Route::get('/articles/{id}',
	'ArticlesController@show');

Route::post('/articles/{id}/updateComment',
	'ArticlesController@updateComment');

/////////////////////////////////////
//Route for User
Route::get('/profile',
	'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/listArticles/{id}',
	'UserController@showOneArticle');

Route::get('/listArticles',
	'UserController@listArticles');

Route::post('/listArticles/{id}',
	'UserController@postCommentUser');



/////////////////////////////////////


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
