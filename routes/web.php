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
    return view('Welcome2')->with('place','home');
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
Route::get('/notify','HomeController@notification');


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


Route::get('navbar',function (){
    return view ('header/header');
});

Route::get('contact', function () {
    return view("Contact.index");
});

Route::get('/scraping','ScrapingController@test');
Route::get('/Moreposts',function (){
    return view('Scrap.Allpost');
});
Route::get('/errors',function (){
    return view('errors.errors');
});
Route::resource('email','EmailController');
Route::get('sendVerificationCode/{user_id}','EmailController@sendVerificationCode');
Route::get('verify/{user_id}/{code}','EmailController@verify');

Route::resource('Profile','ProfileController');

Route::get('/emailsent',function (){
    return view('email.verificationSuccess');
});
Route::get('/verificationfailed',function (){
    return view('email.verificationFail');
});
Route::get('/codeExpire',function (){
    return view('email.codeExpire');
});
Route::get('/alreadyVerified',function (){
    return view('email.alreadyVerified');
});

Route::get('/Themearchive/{id}','ArchiveController@Themearchive');
Route::get('/Categoriearchive/{id}','ArchiveController@Categoriearchive');
Route::get('/Articlearchive/{id}','ArchiveController@Articlearchive');


Route::resource('images','ImagesController');

Route::get('HomeArticles1/{id}','HomeArticlesController@home1');
Route::get('HomeArticles2/{id}','HomeArticlesController@home2');

Route::get('/test',function (){
    return view('test');
});
Route::get('/test2',function (){
    return view('test2');
});
Route::get('/test3',function (){
    return view('test3');
});
Route::resource('subscribe','NewsletterController');
