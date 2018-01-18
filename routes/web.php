<?php


// User Routes
Route::group(['namespace' => 'User'],function(){
	Route::get('/','HomeController@index')->name('posthome');
	Route::get('post/{post?}','PostController@index')->name('post');
	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');

	// Vue routes
	Route::post('getPosts','PostController@getAllPosts');
	Route::post('savelike','PostController@savelike');
	Route::post('liked','PostController@liked');
	Route::get('login','PostController@login');

});
//Admin Routes



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/MarkAllSeen','Admin\PostController@allseen');
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');
	// Users Routes
	Route::resource('admin/user','UserController');
	// Post Routes
	Route::resource('admin/post','PostController');
	// Tag Routes
	Route::resource('admin/tag','TagController');
	// Category Routes
	Route::resource('admin/category','CategoryController');
	// Role Routes
	Route::resource('admin/role','RoleController');
	// Permission Routes
	Route::resource('admin/permission','PermissionController');

	

	// Admin Auth Routes
	Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login','Auth\LoginController@login');
});