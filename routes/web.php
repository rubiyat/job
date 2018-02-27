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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']], function(){

    Route::get('/admin', function(){

        return view('admin.index');

	});

	Route::resource('admin/roles', 'RolesController');

	Route::resource('admin/job-categories', 'JobCategoriesController');
	Route::resource('admin/job-posts', 'JobPostsController');
	Route::resource('admin/photos', 'PhotosController');

	Route::resource('admin/users', 'UsersController');
	Route::resource('admin/user-types', 'UserTypeController');
	Route::get('admin/users/{user}/profile', [
		'as' => 'users.user-profile',
		'uses' => 'UsersController@userProfile'
	]);
	Route::patch('admin/users/{user}/profile-update', [
		'as' => 'users.user-profile.update',
		'uses' => 'UsersController@updateProfile'
	]);	
	Route::resource('admin/admins', 'AdminController');
	Route::resource('admin/contacts', 'ContactController');
	Route::resource('admin/seekers', 'JobSeekerController');
});
