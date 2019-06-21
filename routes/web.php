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

//page d'accueil du client
Route::get('/', 'FrontController@index');

//page des soldes
Route::get('/sale', 'FrontController@indexSale');

//page des produits de la catégorie femme
Route::get('/women', 'FrontController@indexWomen');

//page des produits de la catégorie homme
Route::get('/men', 'FrontController@indexMen');

//page d'une fiche produit côté client
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route sécurisée
Route::resource('admin/product', 'ProductController')->middleware('auth');

//page d'une fiche produit côté admin
Route::get('admin/product/{id}', 'ProductController@show')->where(['id' => '[0-9]+']);
