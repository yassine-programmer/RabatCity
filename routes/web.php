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
})->middleware('verified');

Route::resource('themes','ThemesController')->middleware('verified');
Route::get('Themes/{Theme_type}','ThemesController@afficher')->middleware('verified');
Route::get('themes/create/{theme_type}','ThemesController@create')->middleware('verified');

Route::resource('categories','CategoriesController')->middleware('verified');
Route::get('categories/{id}','CategoriesController@show')->middleware('verified');
Route::get('categories/createCategorie/{id}','CategoriesController@createCategorie')->middleware('verified');
Route::get('categories/{id}/create-sous-categorie','CategoriesController@createSousCategorie')->middleware('verified');

Route::resource('articles','ArticlesController')->middleware('verified');
Route::get('Articles/{Article_id_id}','ArticlesController@afficher')->middleware('verified');
Route::get('articles/create/{Categorie_id}','ArticlesController@create')->middleware('verified');

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('userupdate','HomeController@update');
Route::resource('home','HomeController')->middleware('verified');
Route::get('/AjaxCat', function () {
    return view('Categories.AjaxCategorie');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::get('/Ajax', function () {
    return view('AjaxTest');
});
Route::get('data', function () {
    return view('data');
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

