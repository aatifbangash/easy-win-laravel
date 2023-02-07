<?php

Route::get('/', 'WelcomeController@index');

Route::get('/play/{id}', "WelcomeController@show");

Route::get('/paypal/process', "WelcomeController@process");

Route::get('/paypal/thanks', "WelcomeController@thanks");

Route::get('/user/account', "WelcomeController@user_account");
Route::post('update_account', "WelcomeController@update_account");
Route::get('/user/numbers', "WelcomeController@user_numbers");
Route::get('/user/wins', "WelcomeController@user_wins");
Route::get('/user/payments', "WelcomeController@user_payments");

Route::get('/page/paypal', "WelcomeController@page_paypal");
Route::get('/page/winner', "WelcomeController@winner");
Route::get('/page/{slug}', "WelcomeController@static_page");
// Route::get('/page/credits', "WelcomeController@credits");
// Route::get('/page/contact', "WelcomeController@contact");

Route::get('/ajax/validate_num', "WelcomeController@validate_num");

Route::post('/ajax/expire_num', "WelcomeController@expire_num");

Route::post('/ajax/mark_completed', "WelcomeController@mark_completed");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* admin panel routes */
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/roles', 'Admin\RolesController');
    Route::resource('admin/permissions', 'Admin\PermissionsController');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/pages', 'Admin\PagesController');
    Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
    Route::resource('admin/settings', 'Admin\SettingsController');
    Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

    Route::resource('game', 'Admin\GameController');
    Route::resource('number', 'Admin\NumberController');
    Route::resource('payments', 'Admin\PaymentsController');
    Route::get('winners', 'Admin\GameController@winners');
    Route::resource('winnerspictures', 'Admin\WinnersPicturesController');
});
