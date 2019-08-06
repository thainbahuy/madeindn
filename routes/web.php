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

route::pattern('name' ,'(.*)');
route::pattern('id', '([0-9]*)');


Session::put('locale', 'en');
Route::get('language/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::namespace('Web')->group( function() {

    //Home page
    Route::get('/home', 'ShowHomeController@index')->name('web.index');
    Route::get('/', 'ShowHomeController@index')->name('web.index');
    Route::get('/search','ShowHomeController@searchProject')->name('web.project.project_search');

    // Co-working page
    Route::get('/co-working-space', 'CoWorkingController@index')->name('web.coworking.coworking_space');
    Route::get('/co-working-space/{name}-{id}', 'CoWorkingController@showDetailCoworking')->name('web.coworking.coworking_detail');

    // event page
    Route::get('/event', 'EventController@index')->name('web.event.events');
    Route::get('/event/{eventSlug}', 'EventController@loadEventDetail')->name('web.event.events_detail');

    // project page
    Route::get('project/{name}-{id}.html', 'ProjectController@showDetailProject')->name('web.project.project_detail');
    Route::post('project/{name}-{id}.html', 'ProjectController@postCustomer')->name('web.project.project_detail');
    Route::get('/project/{name}', 'ProjectController@showProjectByCategory')->name('web.project.project_category');
    Route::get('/project/', 'ProjectController@showProjectSubmit')->name('web.project.project_submit');
    Route::post('/project/', 'ProjectController@postProjectSubmit')->name('web.project.project_submit');

    // contact page
    Route::get('/contact', 'ContactController@showContact')->name('web.contact.contact');
    Route::post('/contact', 'ContactController@insertContact')->name('web.contact.contact');

});

Route::get('/test', function () {
    return view('welcome');
});



Route::namespace('Admin')->prefix('admin/')->group( function() {
    Route::get('/dashboard', function () {
        return view('view.admin.dashboard');
    });

    // Config
    Route::get('/config_language', 'ConfigController@showLanngJson')->name('admin.config.lang_json');
    Route::post('/config_language', 'ConfigController@postLanguageJson')->name('admin.config.lang_json');
    Route::get('/config_paginate', 'ConfigController@showPaginateJson')->name('admin.config.paginate_json');
    Route::post('/config_paginate', 'ConfigController@postPaginateJson')->name('admin.config.paginate_json');

   // Test API CDN
    Route::post('/upLoadImage', 'ImageController@upLoadImage');
    Route::post('/deleteImage', 'ImageController@deletImage');

});