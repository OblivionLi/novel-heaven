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
    return view('main.welcome');
});

Route::get('/contact', 'HomeController@contact');

/*Route::resource('news', 'NewsController');*/



// Novels Routes //////////////////////////////////////////////////////////////////////////////////////////////////////////

//Route::resource('novels', 'NovelController');

Route::get('/novels', 'NovelController@index');

Route::post('/novels', 'NovelController@store')->middleware('crudAuthStaff');

Route::get('/novels/create', 'NovelController@create')->middleware('crudAuthStaff');

Route::get('/novels/{slug}', 'NovelController@show');

Route::get('/novels/{slug}/edit', 'NovelController@edit')->middleware('crudAuthStaff');

Route::patch('/novels/{slug}', 'NovelController@update')->middleware('crudAuthStaff');

Route::delete('/novels/{slug}', 'NovelController@destroy')->middleware('crudAuthStaff');

Route::get('/novel/filter', 'NovelController@novelFilter');



// Chapter Routes //////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/novels/{slug}/chapter', 'ChapterController@store')->middleware('crudAuthStaff');

Route::get('/novels/{slug}/chapter/create', 'ChapterController@create')->middleware('crudAuthStaff');

Route::get('/novels/{novel}/chapter/{slug}', 'ChapterController@show');
//Route::get('/novel/chapter/{chapter}', 'ChaptersController@show');

Route::get('/novels/{novel}/chapter/{slug}/edit', 'ChapterController@edit')->middleware('crudAuthStaff');

Route::patch('/novels/{novel}/chapter/{slug}', 'ChapterController@update')->middleware('crudAuthStaff');

Route::delete('/novels/{novel}/chapter/{slug}', 'ChapterController@destroy')->middleware('crudAuthStaff');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Auth::routes();

//Route::get('/news/like/{id}', 'LikeController@likeNews');

Route::post('/genre', 'GenreController@store')->middleware('crudAuthStaff');

Route::get('/genre-create', 'GenreController@create')->middleware('crudAuthStaff');


// CMS Routes /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/cms/dashboard', 'CMSController@dashboard')->middleware('crudAuthStaff');

//Route::get('/cms/news', 'CMSController@news');

Route::get('/cms/novels', 'CMSController@novels')->middleware('crudAuthStaff');

Route::get('/cms/novels/notifications', 'CMSController@novelNotifications')->middleware('crudAuthStaff');

Route::get('/cms/novels/chapters', 'CMSController@novelChapters')->middleware('crudAuthStaff');

Route::get('/cms/users', 'CMSController@users')->middleware('crudAuthStaff');

Route::get('/cms/users/{user}', ['as' => 'users.edit', 'uses' => 'UserController@edit'])->middleware('crudAuthStaff');

Route::patch('/cms/users/{user}/update', ['as' => 'users.update', 'uses' => 'UserController@update'])->middleware('crudAuthStaff');

Route::delete('/cms/users/{user}', ['as' => 'users.delete', 'uses' => 'UserController@destroy'])->middleware('crudAuthStaff');



// USER ROUTES /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*Route::get('/profile/{name}', 'UserController@show');*/
