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

route::pattern('name', '(.*)');
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

    // About us
    Route::get('/about/{name}-{id}', 'AboutController@index')->name('web.more.about');
});


Route::namespace('Admin')->prefix('admin/')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Config
    Route::get('/config_language', 'ConfigController@showLanngJson')->name('admin.config.lang_json');
    Route::post('/config_language', 'ConfigController@postLanguageJson')->name('admin.config.lang_json');
    Route::get('/config_paginate', 'ConfigController@showPaginateJson')->name('admin.config.paginate_json');
    Route::post('/config_paginate', 'ConfigController@postPaginateJson')->name('admin.config.paginate_json');

   // Test API CDN
    Route::post('/upLoadImage', 'ImageController@upLoadImage');
    Route::post('/deleteImage', 'ImageController@deletImage');

    // Project
    Route::get('/project/customer_project', 'CustomerProjectController@showCustomerProject')->name('view.admin.project.project_customer');
    Route::get('/project/customer_project/view_{id}', 'CustomerProjectController@showCustomerProjectById')->name('view.admin.project.detail_project_submit');
    Route::get('/project/customer_project/delete', 'CustomerProjectController@deleteProjectSubmit')->name('admin.project.project_customer.delete');


    // Contact
    Route::get('/contact/contact_project', 'ContactController@showContactProject')->name('view.admin.contact.project_customer');
    Route::get('/contact/contact_project/delete', 'ContactController@deleteInfoCustomerProject')->name('admin.contact.project_customer_delete');

    Route::get('/contact/info_contact', 'ContactController@showContactCustomer')->name('view.admin.contact.contact_customer');
    Route::get('/contact/info_contact/delete', 'ContactController@deleteInfoCustomer')->name('admin.contact.contact_customer_delete');

    //Coworking
    Route::get('/coworking', 'CoworkingController@showAllCowroking')->name('view.admin.coworking.coworking_space');
    Route::get('/coworking/delete', 'CoworkingController@deleteCoworking')->name('admin.coworking.coworking_space_delete');
    Route::get('/coworking/add', 'CoworkingController@getAddCoworking')->name('view.admin.coworking.add_coworking_space');
    Route::post('/coworking/add', 'CoworkingController@postAddCoworking')->name('admin.coworking.add_coworking_space');

    Route::get('/coworking/edit/{id}', 'CoworkingController@getEditCoworking')->name('view.admin.coworking.edit_coworking_space');
    Route::post('/coworking/edit/{id}', 'CoworkingController@postEditCoworking')->name('admin.coworking.edit_coworking_space');

    //Project Admin
    Route::get('/project_admin', 'ProjectController@showAllProject')->name('view.admin.project_admin.project');
    Route::get('/project_admin/delete', 'ProjectController@deleteProject')->name('admin.project_admin.project_delete');
    Route::get('/project_admin/add', 'ProjectController@getAddProject')->name('view.admin.project_admin.add_project');
    Route::post('/project_admin/add', 'ProjectController@postAddProject')->name('admin.project_admin.add_project');
    Route::get('/project_admin/edit/{id}', 'ProjectController@getEditProject')->name('view.admin.project_admin.edit_project');
    Route::post('/project_admin/edit/{id}', 'ProjectController@postEditProject')->name('admin.project_admin.edit_project');
    Route::get('/project_admin/change_status', 'ProjectController@ajaxChangeStatus')->name('change_status_project');

});