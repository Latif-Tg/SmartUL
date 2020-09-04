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

/**
 * Route 
 */

#Publication de documents

/**
 * Administration and faculties routes
 */
Route::namespace('Admin')->group(function() {

    Route::get('/faculty/login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/faculty/login','Auth\LoginController@login');
    Route::get('/faculty/home','AdminController@home')->name('admin.home');
    Route::get('/faculty/register','Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/faculty/register','Auth\RegisterController@register');

    /**Gestion  */
    Route::group(['prefix' => 'SmartUL'], function() {

        Route::get('/faculty/pages/documents/publish','AdminController@index')->name('document.admin.index');
        Route::get('/faculty/pages/documents/document','AdminController@create')->name('document.admin.create');
        Route::post('/faculty/pages/documents/document','AdminController@store');
        Route::get('/faculty/pages/documents/{document}','AdminController@show')->name('document.admin.show');
        Route::get('/faculty/pages/documents/{document}/edit','AdminController@edit')->name('document.admin.edit');
        Route::patch('/faculty/pages/documents/{document}/edit','AdminController@update');
        Route::delete('/faculty/pages/documents/{document}/edit','AdminController@destroy');

        Route::get('/faculty/pages/domaines','AdminController@getAllDomaines')->name('domaine.Aindex');
        Route::get('/faculty/pages/types','AdminController@getAllTypes')->name('type.Aindex');
    });
        
    /**
     * Gerer les types et domaines
     */
    Route::post('admin/post/new/domaine','AdminController@storeDomaine')->name('fac_new_domaine');
    Route::post('admin/post/new/type','AdminController@storeType')->name('fac_new_type');

});
/**
 * Professionnal such as professors routes
 */
Route::namespace('Enseignant')->group(function() {

    Route::get('/professionnal/login','Auth\LoginController@showLoginForm')->name('professionnal.login');
    Route::post('/professionnal/login','Auth\LoginController@login');
    Route::get('/professionnal/home','EnseignantController@home')->name('professionnal.home');

    Route::get('/professionnal/register','Auth\RegisterController@showRegistrationForm')->name('professionnal.register');
    Route::post('/professionnal/register','Auth\RegisterController@register');

    #Gerer ses publications
    Route::group(['prefix' => 'SmartUL'], function() {

        Route::get('/prof/pages/documents/publish','EnseignantController@index')->name('document.prof.index');
        Route::get('/prof/pages/documents/document','EnseignantController@create')->name('document.prof.create');
        Route::post('/prof/pages/documents/document','EnseignantController@store');
        Route::get('/prof/pages/documents/{document}','EnseignantController@show')->name('document.prof.show');
        Route::get('/prof/pages/documents/{document}/edit','EnseignantController@edit')->name('document.prof.edit');
        Route::patch('/prof/pages/documents/{document}/edit','EnseignantController@update');
        Route::delete('/prof/pages/documents/{document}/edit','EnseignantController@destroy');
        
        Route::get('/prof/pages/domaines','EnseignantController@getAllDomaines')->name('domaine.index');
        Route::get('/prof/pages/types','EnseignantController@getAllTypes')->name('type.index');
    });
    
    /**
     * Gerer les types et domaines
     */
    Route::post('/post/new/domaine','EnseignantController@storeDomaine')->name('pro_new_domaine');
    Route::post('/post/new/type','EnseignantController@storeType')->name('pro_new_type');
});


#Ajouter un domaine
#Route::get('/admin/pages/domaines/dom_index','DomainController@index')->name('domaine.index');
#Route::get('/admin/pages/domaines/domaine','DomainController@create')->name('domaine.create');
#Route::post('/admin/pages/domaines/domaine','DomainController@store');
#Route::get('/admin/pages/domaines/{domaine}/edit','DomainController@edit')->name('domaine.edit');
#Route::patch('/admin/pages/domaines/{domaine}','DomainController@update');
#Route::delete('/admin/pages/domaines/{domaine}','DomainController@destroy');
#Ajouter un type de document
#Route::get('/admin/pages/types/typ_index','TypeController@index')->name('type.index');
#Route::get('/admin/pages/types/type','TypeController@create')->name('type.create');
#Route::post('/admin/pages/types/type','TypeController@store');
#Route::get('/admin/pages/types/{type}/edit','TypeController@edit')->name('type.edit');
#Route::patch('/admin/pages/types/{type}','TypeController@update');
#Route::delete('/admin/pages/types/{type}','TypeController@destroy');

/*Route::get('/', function () {
    return view('welcome');
});*/
/**
 * Routes for users
 * 
 */
Route::group(['prefix' => 'smart_UL/']  , function() {
    
    Route::get('index','MainController@getHome')->name('welcome_page');
    Route::get('documentation','MainController@getAllDocuments')->name('documentation');
    Route::get('contact_us','MainController@contact_us')->name('contact_us');
    Route::get('get-more-type','MainController@getMoreType')->name('moreType');
    Route::get('get-more-domaine','MainController@getMoreDomaine')->name('moreDomaine');
    Route::get('get-documents-by-criteria/{type}/{domaine}/{year}','MainController@getDocByCriteria')->name('sortResultDoc');
    #27-08-2020
    Route::get('get-document-details/{document}','MainController@getDocumentDetails')->name('showDocDetails');
    #
    Route::post('add-new-comment/{document}','HomeController@comment')->name('comment');

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Site traffic
 * MainController
 */
Route::get('/login-choice','MainController@getLoginChoice')->name('getLoginChoice');