<?php

/**
 * Frontend Controllers
 */
get('macros', 'FrontendController@macros');
/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function () {
    get('/', 'FrontendController@index')->name('home');
    get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
    get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
    patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});
