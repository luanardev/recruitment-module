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

Route::prefix('recruitment')->group(function() {
    Route::get('/', 'HomeController@index')->name('recruitment.home');
   
    Route::get('vacancy/index', 'VacancyController@index')->name('vacancy.index');

    Route::get('vacancy/create', 'VacancyController@create')->name('vacancy.create');

    Route::get('vacancy/{vacancy}', 'VacancyController@show')->name('vacancy.show');

    Route::get('vacancy/{vacancy}/print', 'VacancyController@print')->name('vacancy.print');

    Route::get('applications/{vacancy}', 'ApplicationController@index')->name('applications.index');

    Route::get('applications/{vacancy}/print', 'ApplicationController@printAll')->name('applications.print');

    Route::get('application/{application}', 'ApplicationController@show')->name('application.show');

    Route::get('application/{application}/print', 'ApplicationController@print')->name('application.print');

    Route::get('shortlist/index', 'ShortlistController@index')->name('shortlist.index');

    Route::post('shortlist/printall', 'ShortlistController@printall')->name('shortlist.printall');

    Route::get('shortlist/{vacancy}', 'ShortlistController@show')->name('shortlist.show');

    Route::get('shortlist/{vacancy}/print', 'ShortlistController@print')->name('shortlist.print');

    Route::get('interview/index', 'InterviewController@index')->name('interview.index');

    Route::get('interview/create', 'InterviewController@create')->name('interview.create');

    Route::get('interview/{interview}/show', 'InterviewController@show')->name('interview.show');
    

});
