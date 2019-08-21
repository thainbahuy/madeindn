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
    // get total project by category for homepage
    Route::get('/project/total','ShowHomeController@getTotalProjectByCategory')->name('web.index.totalProjectByCategory');

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


Route::namespace('Admin')->middleware('guest')->prefix('admin/')->group( function() {

    //Dashboard
    Route::get('/dashboard', 'DashboardController@showDashboard')->name('dashboard');
    Route::POST('/dashboard/change_background', 'DashboardController@changeBackgroundHome')->name('change_background_home');

    // Config
    Route::get('/config_language', 'ConfigController@showLanngJson')->name('admin.config.lang_json');
    Route::post('/config_language', 'ConfigController@postLanguageJson')->name('admin.config.lang_json');
    Route::get('/config_paginate', 'ConfigController@showPaginateJson')->name('admin.config.paginate_json');
    Route::post('/config_paginate', 'ConfigController@postPaginateJson')->name('admin.config.paginate_json');

    //event
    Route::get('/event', 'EventController@showListEvent')->name('view.admin.event.event_list');
    Route::get('/event/add', 'EventController@showAddNewEvent')->name('view.admin.event.addnew');
    Route::post('/event/add', 'EventController@addNewEvent')->name('admin.event.addnew');
    Route::post('/event/edit/{id}', 'EventController@updateEvent')->name('admin.event.edit');
    Route::get('/event/edit/{id}', 'EventController@showEditEvent')->name('view.admin.event.edit');
    Route::get('/event/delete', 'EventController@deleteEventById')->name('admin.event.event_list.delete');
    Route::post('/event/setImage', 'EventController@setImageBackground')->name('admin.event.event_list.setImage');






    // Project
    Route::get('/project/customer_project', 'CustomerProjectController@showCustomerProject')->name('view.admin.project.project_customer');
    Route::get('/project/customer_project/view_{id}', 'CustomerProjectController@showCustomerProjectById')->name('view.admin.project.detail_project_submit');
    Route::get('/project/customer_project/delete', 'CustomerProjectController@deleteProjectSubmit')->name('admin.project.project_customer.delete');
    Route::get('/project/customer_project/download/{name}', 'CustomerProjectController@downloadFile')->name('download_file');

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


    //Category
    Route::get('/category', 'CategoryController@showAllCategory')->name('view.admin.category.view_category');
    Route::get('/category/delete', 'CategoryController@deleteCategory')->name('admin.category.delete_category');
    Route::get('/category/add', 'CategoryController@getAddCategory')->name('view.admin.category.add_category');
    Route::post('/category/add', 'CategoryController@postAddCategory')->name('admin.category.add_category');
    Route::get('/category/edit/{id}', 'CategoryController@getEditCategory')->name('view.admin.category.edit_category');
    Route::post('/category/edit/{id}', 'CategoryController@postEditCategory')->name('admin.category.edit_category');

    //About
    Route::get('/about', 'AboutController@showAllAbout')->name('view.admin.about.about');
    Route::get('/about/add', 'AboutController@getAddAbout')->name('view.admin.about.add_about');
    Route::post('/about/add', 'AboutController@postAddAbout')->name('admin.about.add_about');
    Route::get('/about/edit/{id}', 'AboutController@getEditAbout')->name('view.admin.about.edit_about');
    Route::post('/about/edit/{id}', 'AboutController@postEditAbout')->name('admin.about.edit_about');
    Route::get('/about/delete', 'AboutController@deleteAbout')->name('admin.about.about_delete');

    //partner
    Route::get('/partner-background', 'PartnerBackgroundController@index')->name('view.admin.partner.partner_background_list');
    Route::get('/partner-background/add', 'PartnerBackgroundController@showAddNewPartnerBackground')->name('view.admin.partner.add_partner_background');
    Route::post('/partner-background/add', 'PartnerBackgroundController@addNewPartnerBackground')->name('admin.partner.add_partner_background');
    Route::get('/partner-background/delete', 'PartnerBackgroundController@deletePartnerBackground')->name('admin.partner.partner_background_list.delete');
});

//Auth
Route::get('account/login', 'Admin\Auth\LoginController@showLoginForm')->name('view.admin.Auth.login');
Route::post('account/login', 'Admin\Auth\LoginController@login')->name('admin.Auth.login');
Route::get('account/logout', 'Admin\Auth\LoginController@logout')->name('logout');
Route::get('account/forgot-password', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('view.admin.Auth.forgotpass');
Route::post('account/forgot-password', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.Auth.forgotpass');
Route::post('account/forgot-password', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.Auth.forgotpass');
Route::get('account/reset-password/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('resetpass');
Route::post('account/reset-password', 'Admin\Auth\ResetPasswordController@reset')->name('admin.Auth.resetpass');

//Route::get('ABC',function(){
//    echo Hash::make('thaibahuy');
//});
 //Test API CDN
    Route::post('test/upLoadImage', 'Admin\ImageController@upLoadImage');
    Route::post('test/deleteImage', 'Admin\ImageController@deletImage');