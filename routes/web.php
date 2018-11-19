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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// cria filtro de grupo. Especifica que para acessar o dashboard admin é necessário estar
// autenticado
Route::group([
    'middleware' => ['auth'],
    'namespace' => 'Adminlte',
    'prefix' => 'adminlte',
    ], function (){

    Route::put('/manchetes/excluir','AdminController@excluirManchetes')->name('manchetes.editar');
    Route::delete('/manchetes/excluir','AdminController@excluirManchetes')->name('manchetes.excluir');
    Route::post('/manchetes','AdminController@cadastrarManchetes')->name('manchetes.cadastrar');
    Route::get('/manchetes/cadastro','AdminController@cadastroDeManchetes')->name('manchetes.cadastro');
    Route::get('/manchetes','AdminController@mostrarManchetes')->name('admin.mostrarManchetes');

    Route::put('/temas/editar','AdminController@editarTema')->name('temas.editar');
    Route::delete('/temas/excluir','AdminController@excluirTema')->name('temas.excluir');
    Route::post('/temas','AdminController@cadastrarTemas')->name('temas.cadastrar');
    Route::get('/temas/cadastro','AdminController@cadastroDeTemas')->name('temas.cadastro');
    Route::get('/temas','AdminController@mostrarTemas')->name('admin.temas');

    Route::get('/','AdminController@index')->name('admin.home');
});
// antes da refatoração acima era como na linha abaixo
//Route::get('admin','Admin\AdminController@index')->name('admin.home');

Route::get('/', 'Site\GepesController@index')->name('home');
Route::get('/gepes', 'Site\GepesController@index')->name('gepesHome');
Route::get('/home', 'Site\GepesController@index')->name('home');
//    function () {
//    return view('welcome');
//});
//
Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');


