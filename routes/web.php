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

Route::get('/home', function () {
    return view('web.index');
});

Route::get('/co-working-detail', function () {
    return view('web.coworking.coworking_detail');
});

Route::get('/co-working-space', function () {
    return view('web.coworking.coworking_space');
});

Route::get('/event', function () {
    return view('web/event.events');
});

Route::get('/event-detail', function () {
    return view('web.event.events_detail');
});

Route::get('/about', function () {
    return view('web.more.about');
});

Route::get('/contact', function () {
    return view('web.more.contact');
});

Route::get('/how-can-we-help', function () {
    return view('web.more.how_can_we_help');
});

Route::get('/project-category', function () {
    return view('web.project.project_category');
});

Route::get('/project-detail', function () {
    return view('web.project.project_detail');
});

Route::get('/project-search', function () {
    return view('web.project.project_search');
});


Route::prefix('admin/')->group( function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});