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

Route::resource('themes','ThemesController');
Route::get('themes/create/{theme_type}','ThemesController@create');
Route::resource('categories','CategoriesController');
Route::get('categories/{id}','CategoriesController@show');
Route::get('categories/createCategorie/{id}','CategoriesController@createCategorie');
Route::get('categories/{id}/create-sous-categorie','CategoriesController@createSousCategorie');

Route::get('/AjaxCat', function () {
    return view('Categories.AjaxCategorie');
});

Route::get('/Ajax', function () {
    return view('AjaxTest');
});
Route::get('data', function () {
    return view('data');
});
Route::resource('services','ServicesController');
Route::resource('activites','ActivitesController');
