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

Route::get('/', function () {
    return redirect('/films');
});
Route::get('/logout', [ 'uses' => 'Auth\LoginController@logout']);
Route::get('/films', ['uses' => 'FilmController@index']);
Route::get('/films/{name}', ['uses' => 'FilmController@singleFilm']);


Route::get('/films/create',['middleware' => "auth",  function () {
    return view('films.create');
}]);

Route::post('/films/create', ['middleware' => "auth", 'uses' => 'FilmController@create']);
Route::post('/comments/create', ['middleware' => "auth", 'uses' => 'FilmController@addComments']);
