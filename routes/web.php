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
    return view('Welcome2');
});

Route::resource('themes','ThemesController');
Route::get('Themes/{Theme_type}','ThemesController@afficher');
Route::get('themes/create/{theme_type}','ThemesController@create');

Route::resource('categories','CategoriesController');
Route::get('categories/{id}','CategoriesController@show');
Route::get('categories/createCategorie/{id}','CategoriesController@createCategorie');
Route::get('categories/{id}/create-sous-categorie','CategoriesController@createSousCategorie');

Route::resource('articles','ArticlesController');
Route::get('Articles/{Article_id_id}','ArticlesController@afficher');
Route::get('articles/create/{Categorie_id}','ArticlesController@create');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('userupdate','HomeController@update');
Route::resource('home','HomeController');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::resource('search','SearchController');

Route::get('/ViderJournal','JournalsController@vider');

Route::get('/Arrondissements',function (){
    return view('Arrondissements');
});



Route::get('modal', function (){
    return view('layouts.modal');
});
//
//Route::get('media-manager', function (){
//    return view('MediaManager');
//});

Route::get('navbar',function (){
    return view ('header/header');
});

