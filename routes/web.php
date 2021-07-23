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
Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});
Route::get('/', 'ArticleController@index')->name('articles.index');
Route::resource('/articles','ArticleController')->except(['index','show'])->middleware('auth');
Route::resource('/articles','ArticleController')->only(['show']);
Route::prefix('articles')->name('articles.')->group(function() {
  Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
  Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
  Route::get('/{article}/getresolved', 'ArticleController@getresolved')->name('getresolved');
});
Route::get('/unsolved', 'ArticleController@unsolved')->name('articles.unsolved');
Route::get('/resolved', 'ArticleController@resolved')->name('articles.resolved');
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');
Route::prefix('users')->name('users.')->group(function() {
  Route::get('/{name}','UserController@show')->name('show');
  Route::get('/{name}/comments','UserController@comments')->name('comments');
  Route::get('/{name}/edit','UserController@edit')->name('edit');
  Route::patch('/{name}','UserController@update')->name('update');
});
Route::post('/articles/{article}/commentstore', 'CommentController@store')->name('comments.store');

