<?php
/**
 * User management routes
 */
Route::get('login', array('uses' => 'OutOfOffice\User\Controllers\AccountController@login', 'as' => 'user.account.login'));
Route::post('login', array('uses' => 'OutOfOffice\User\Controllers\AccountController@auth', 'as' => 'user.account.auth', 'before' => 'csrf'));
Route::get('logout', array('uses' => 'OutOfOffice\User\Controllers\AccountController@logout', 'as' => 'user.account.logout'));

Route::get('signup', array('uses' => 'OutOfOffice\User\Controllers\AccountController@signup', 'as' => 'user.account.signup'));
Route::post('signup', array('uses' => 'OutOfOffice\User\Controllers\AccountController@store', 'as' => 'user.account.store'));

Route::get('register/verify/fail', ['uses' => 'OutOfOffice\User\Controllers\AccountController@confirmFailed', 'as' => 'user.register.failed']);
Route::get('register/verify/{confirmationCode}', ['uses' => 'OutOfOffice\User\Controllers\AccountController@confirm', 'as' => 'user.register.confirm']);

Route::controller('password', 'OutOfOffice\User\Controllers\RemindersController');

Route::group(array('before' => 'auth|isAdmin'), function()
{
    Route::get('user', array('uses' => 'OutOfOffice\User\Controllers\ManageController@index', 'as' => 'user.manage.index'));
    Route::get('user/create', array('uses' => 'OutOfOffice\User\Controllers\ManageController@create', 'as' => 'user.manage.create'));
    Route::post('user/create', array('uses' => 'OutOfOffice\User\Controllers\ManageController@store', 'as' => 'user.manage.store', 'before' => 'csrf'));
    Route::delete('user/{id}', array('uses' => 'OutOfOffice\User\Controllers\ManageController@destroy', 'as' => 'user.manage.destroy', 'before' => 'csrf'))->where('id', '[0-9]+');

});

Route::group(array('before' => 'auth'), function()
{
    Route::get('user/{id}', array('uses' => 'OutOfOffice\User\Controllers\ManageController@show', 'as' => 'user.manage.show'))->where('id', '[0-9]+');
    Route::get('user/{id}/edit', array('uses' => 'OutOfOffice\User\Controllers\ManageController@edit', 'as' => 'user.manage.edit'))->where('id', '[0-9]+');
    Route::put('user/{id}', array('uses' => 'OutOfOffice\User\Controllers\ManageController@update', 'as' => 'user.manage.update', 'before' => 'csrf'))->where('id', '[0-9]+');
});