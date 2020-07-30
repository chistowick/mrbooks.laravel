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

//Route::get('/', function () {
//    return view('welcome');
//});
// Маршрут для главной страницы
Route::get('/', 'PublicationsController@getList')->name('publications-list');

// Маршрут для страницы с отдельной публикацией
Route::get('publications/{name}', 'PublicationsController@getOneItem')->name('publication');

// Маршрут для страницы О БЛОГЕ
Route::get('about-me', function() {

    return view('about_me');
})->name('about-me');


// Маршрут для страницы ЧТО ПОЧИТАТЬ
Route::get('what-to-read', function() {

    return view('what_to_read');
})->name('what-to-read');

// Маршрут для обработки AJAX страницы ЧТО ПОЧИТАТЬ
Route::post('what-to-read/ajax', 'AjaxController@getWtrList');



// Маршрут для страницы ЦИТАТЫ
Route::get('quotes', function() {

    return view('quotes');
})->name('quotes');

// Маршрут для обработки AJAX страницы ЦИТАТЫ
Route::post('quotes/ajax', 'AjaxController@getRandomQuotes');



// Маршрут для страницы КОНТАКТЫ
Route::get('contacts', function() {

    return view('contacts');
})->name('contacts');

// Маршрут для обработки AJAX страницы КОНТАКТЫ
Route::post('contacts/ajax', 'AjaxController@sendFeedbackEmail');