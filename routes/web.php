<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Auth::routes();

Route::get('/home','HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/{slug}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);

Route::group(['middleware' => 'admin'], function(){

	Route::get('/admin', function(){
		return view('admin.index');
	});

	Route::resource('/admin/users', 'AdminUsersController', ['names' => [
		'index' => 'admin.users.index',
		'edit' => 'admin.users.edit',
		'create' => 'admin.users.create',
		'store' => 'admin.users.store',
		'destroy' => 'admin.users.destroy',
		'show' => 'admin.users.show',
		'update' => 'admin.users.update',
	]]);

	Route::resource('/admin/posts', 'AdminPostsController', ['names' => [
		'index' => 'admin.posts.index',
		'edit' => 'admin.posts.edit',
		'create' => 'admin.posts.create',
		'store' => 'admin.posts.store',
		'destroy' => 'admin.posts.destroy',
		'show' => 'admin.posts.show',
		'update' => 'admin.posts.update',
	]]);

	Route::get('/admin/categories/categoryposts', 'AdminCategoriesController@categoryposts');

	Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [
		'index' => 'admin.categories.index',
		'edit' => 'admin.categories.edit',
		'create' => 'admin.categories.create',
		'store' => 'admin.categories.store',
		'destroy' => 'admin.categories.destroy',
		'show' => 'admin.categories.show',
	]]);

	Route::resource('admin/media', 'AdminMediasController', ['names' => [
		'index' => 'admin.media.index',
		'edit' => 'admin.media.edit',
		'create' => 'admin.media.create',
		'store' => 'admin.media.store',
		'destroy' => 'admin.media.destroy',
	]]);

	Route::resource('admin/comments', 'PostCommentsController', ['names' => [
		'index' => 'admin.comments.index',
		'edit' => 'admin.comments.edit',
		'create' => 'admin.comments.create',
		'store' => 'admin.comments.store',
		'destroy' => 'admin.comments.destroy',
		'show' => 'admin.comments.show',
	]]);

	Route::resource('admin/comments/replies', 'CommentRepliesController', ['names' => [
		'index' => 'admin.comments.replies.index',
		'edit' => 'admin.comments.replies.edit',
		'create' => 'admin.comments.replies.create',
		'store' => 'admin.comments.replies.store',
		'destroy' => 'admin.comments.replies.destroy',
		'show' => 'admin.comments.replies.show',
	]]);
});
Route::group(['middleware' => 'auth'], function(){

	Route::post('comment/reply', 'CommentRepliesController@createreply');
});