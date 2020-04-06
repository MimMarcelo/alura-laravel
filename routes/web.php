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
Route::get('/series', 'SeriesController@index');
/*
 * Faz a associação das ações com os métodos do Controller de forma automática,
 * Mas precisa seguir as convenções listadas em:
 * https://laravel.com/docs/7.x/controllers
 */
// Route::resource('series', 'SeriesController');
