<?php

Route::group(array('before' => 'auth'), function()
{
    Route::get('status', array('uses' => 'OutOfOffice\Status\Controllers\ManageController@index', 'as' => 'status.manage.index'));
    Route::get('status/create', array('uses' => 'OutOfOffice\Status\Controllers\ManageController@create', 'as' => 'status.manage.create'));
});