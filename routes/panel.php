<?php

Route::namespace('App\Http\Controllers\Panels')->prefix('panel')->middleware('auth', '\App\Http\Middleware\UserPanel')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::post('/users/{user}/email-status', 'UserController@manageEmailStatus')->name('users.manage-email-status');
    Route::resource('/users', 'UserController');
    Route::resource('/properties', 'PropertyController');
    Route::resource('/vids-recs-pics', 'VidRecPicController');

    Route::resource('/progress-sheets', 'ProgressSheetController');
    Route::post('/progress-sheet/duplicate', 'ProgressSheetController@duplicateStore')->name('progress-sheet.duplicate.store');
    Route::get('/progress-sheet/{progress_sheet}/duplicate', 'ProgressSheetController@duplicate')->name('progress-sheet.duplicate');

    Route::resource('/repair-requests', 'RepairRequestController');
    Route::resource('/payments', 'PaymentController')->only(['index', 'create']);

    Route::delete('/temp-upload/revert', 'TempMediaController@destroy');
    Route::resource('/temp-upload', 'TempMediaController')->only([
        'store', 'update'
    ]);

    Route::post('/temp-upload-v2', 'TempMediaController@storeV2')->name('temp-upload.store.v2');

    Route::get('tenants/properties', 'TenantPropertyController@index')->name('tenants.properties.index');
    Route::get('tenants/properties/{property}', 'TenantPropertyController@show')->name('tenants.properties.show');
});
