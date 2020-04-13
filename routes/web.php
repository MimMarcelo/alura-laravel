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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout')->name('login.logout');
Route::post('/login', 'LoginController@logar')->name('login.index');

Route::get('/registro', 'RegistroController@create')->name('registro.create');
Route::post('/registro', 'RegistroController@store')->name('registro.store');

Route::get('/series', 'SeriesController@index')->name('series.index');
Route::get('/series/criar', 'SeriesController@create')->name('series.create');
Route::post('/series/criar', 'SeriesController@store')->name('series.store');
Route::delete('/series/remover/{id}', 'SeriesController@destroy')->name('series.destroy');
Route::post('/series/{id}/editarNome', 'SeriesController@editarNome')->name('series.editarNome');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index')->name('temporadas.index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->name('episodios.assistir');
/*
 * Faz a associação das ações com os métodos do Controller de forma automática,
 * Mas precisa seguir as convenções listadas em:
 * https://laravel.com/docs/7.x/controllers
 */
// Route::resource('series', 'SeriesController');
