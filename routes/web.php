<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/stage/', ('StageController@list'))->name('stage-list');
Route::get('/stage/create', ('StageController@create'))->name('stage-create');
Route::get('/stage/{id}', ('StageController@afficher'))->name('stage-id')->where('id','[0-9]+');
Route::post('/stage/', ('StageController@store'))->name('stage-store');
Route::delete('/stage/delete/{id}', ('StageController@delete'))->name('stage-delete');
Route::get('/stage/edit/{id}', ('StageController@edit'))->name('stage-edit');
Route::put('/stage/update/{id}', ('StageController@update'))->name('stage-update');
Route::get('stage/dropdown/', ('StageController@dropdown'))->name('stage-dropdown');
Route::post('/stage/afficher', ('StageController@afficher2'))->name('stage-afficher')->where('id','[0-9]+');
Route::get('/', ('FrontController@accueil'))->name('home');
Route::resource('entreprise', 'EntrepriseController');
Route::resource('eleve', 'EleveController');
Route::get('language/{lang}', 'LangController@language')->name('language');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/dashboard', 'HomeController@adminDashboard')->name('admin.dashboard')->middleware('is_admin');

Route::get('/stage/postluler', ('StageController@listpostuler'))->name('listpostuler');
Route::post('/stage/postuler/{eleve}/{stage}', ('StageController@postuler'))->name('stage-postuler');
Route::get('/stage/valider', ('AdminController@demande'))->name('validation');

Route::resource('photo', 'PhotoController');
Route::get('/galeriePhoto', 'PhotoController@list')->name('galerie');