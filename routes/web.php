<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/storage/{file}', function ($file) {
    $filePath = 'app/public' . $file;
    // Check if the file exists in the storage/app/public directory
    if (!preg_match('/\.(jpg|jpeg|png|gif|pdf)$/', $file) || !file_exists(storage_path($filePath))) {
        abort(404, 'File not found');
    }

    // Return the file
    return response()->file(storage_path($filePath));
})->where('file', '.*');

Route::namespace('App\Http\Livewire')->group(function () {
    Route::get('/property-owner-register', 'Site\Pages\PropertyOwnerRegister');

    Route::redirect('/one-time-user/payment/details', '/one-time-user/payment');
    Route::get('/one-time-user/payment', 'Payment\Container')->middleware('auth')->name('one-time-user.payment');
});


Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'PageController@home');


    Route::resource('/switch-users', 'SwitchUserController')->only(['index', 'update']);

    // Auth
    Route::get('/login', 'Auth\AuthenticatedSessionController@create')->middleware('guest')->name('login');
    Route::post('/login', 'Auth\AuthenticatedSessionController@store')->middleware('guest');
    Route::get('/register', 'Auth\RegisteredUserController')->middleware('guest');
    Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->middleware('auth')->name('logout');

    Route::get('/about-us', 'PageController@aboutUs');

    Route::get('/management-plans', 'PageController@managementPlans');

    Route::get('/contact-us', 'ContactUsController@index');
    Route::post('/contact-us/send', 'ContactUsController@send')->name('sendContactForm');

    Route::get('/property-listing', 'PageController@propertyListing');

    Route::get('/property-page', 'PageController@propertyPage');

    Route::get('/faq', 'PageController@faq');

    Route::get('/terms-and-condition', 'PageController@termsAndConditions');

    Route::get('/privacy-policy', 'PageController@privacyPolicy');

    //Property
    Route::get('/properties', 'PropertyController@index')->name('site-properties.index');
    Route::get('/properties/{property}', 'PropertyController@show')->name('site-properties.show');
    Route::get('/property-listing-registration', 'PropertyListingRegistration')->name('property-listing-registration');



    Route::prefix('services')->group(function () {

        Route::get('/plumbing', 'ServicesController@plumbing');

        Route::get('/electrical', 'ServicesController@electrical');

        Route::get('/carpentry', 'ServicesController@carpentry');

        Route::get('/dry-wall', 'ServicesController@dryWall');

        Route::get('/painting', 'ServicesController@painting');

        Route::get('/doors', 'ServicesController@doors');

        Route::get('/windows', 'ServicesController@windows');

        //Route::get('/ceiling', 'ServicesController@ceiling');

        Route::get('/flooring', 'ServicesController@flooring');

        //Route::get('/carpet-cleaning', 'ServicesController@carpetCleaning');

        //Route::get('/appliance-repairs-new-installation', 'ServicesController@applianceRepairsNewInstallation');

        Route::get('/roofing', 'ServicesController@roofing');

        //Route::get('/exterior-structure', 'ServicesController@exteriorStructure');

        Route::get('/new-builds', 'ServicesController@newBuilds');
        Route::get('/add-ons', 'ServicesController@addOns');
        Route::get('/jadus', 'ServicesController@jadus');
        Route::get('/adus', 'ServicesController@adus');
        Route::get('/hardscaping', 'ServicesController@hardScaping');
        Route::get('/softscaping', 'ServicesController@softScaping');

        //Route::get('/gardening', 'ServicesController@gardening');

        //Route::get('/springkler-systems', 'ServicesController@springklerSystems');

        //Route::get('/tree-trimming-removal-installation', 'ServicesController@treeTrimmingRemovalInstallation');

        //Route::get('/retaining-walls', 'ServicesController@retainingWalls');

        //Route::get('/fencing', 'ServicesController@fencing');

        //Route::get('/concrete', 'ServicesController@concrete');

        Route::get('/rent-collection', 'ServicesController@rentCollection');

        Route::get('/tenant-occupancy', 'ServicesController@tenantOccupancy');

        Route::get('/evictions', 'ServicesController@evictions');

        Route::get('/monthly-statements', 'ServicesController@monthlyStatements');

        Route::get('/project-management', 'ServicesController@projectManagement');
        Route::get('/property-management', 'ServicesController@propertyManagement');
        Route::get('/full-property-maintenance', 'ServicesController@fullPropertyMaintenance');
        Route::get('/reporting', 'ServicesController@reporting');
        Route::get('/app-access-monitoring', 'ServicesController@appAccessMonitoring');

        Route::get('/property-inspections', 'ServicesController@propertyInspections');

        Route::get('/locks', 'ServicesController@locks');

        Route::get('/seals', 'ServicesController@seals');

        Route::get('/leaks', 'ServicesController@leaks');

        Route::get('/smoke-detector', 'ServicesController@smokeDetector');

        Route::get('/extermination', 'ServicesController@extermination');

        Route::get('/site-check', 'ServicesController@siteCheck');

        Route::get('/mold', 'ServicesController@mold');
        Route::get('/lead', 'ServicesController@lead');
        Route::get('/remediation', 'ServicesController@remediation');
    });


    /* Panel - templates */
    Route::prefix('tenant')->group(function () {
        Route::get('/dashboard', 'Panels\TenantController@dashboard');
        Route::get('/maintenance-repair/index', 'Panels\TenantController@maintenanceRepair');
        Route::get('/payment/details', 'Panels\TenantController@paymentDetails');
        Route::get('/payment/confirm', 'Panels\TenantController@paymentConfirm');
        Route::get('/payment/success', 'Panels\TenantController@paymentSuccess');
    });

    Route::prefix('property-owner')->group(function () {
        Route::get('/dashboard', 'Panels\PropertyOwnerController@dashboard');
        Route::get('/my-account/view', 'Panels\PropertyOwnerController@myAccountView');
        Route::get('/my-account/edit', 'Panels\PropertyOwnerController@myAccountEdit');
        Route::get('/progress-sheet/view', 'Panels\PropertyOwnerController@progressSheetView');
        Route::get('/progress-sheet/show', 'Panels\PropertyOwnerController@progressSheetShow');
        Route::get('/request-a-quote/index', 'Panels\PropertyOwnerController@requestAQuote');
        Route::get('/payment/details', 'Panels\PropertyOwnerController@paymentDetails');
        Route::get('/payment/confirm', 'Panels\PropertyOwnerController@paymentConfirm');
        Route::get('/payment/success', 'Panels\PropertyOwnerController@paymentSuccess');
        Route::get('/vid-rec-pic/view', 'Panels\PropertyOwnerController@vidRecPic');
        Route::get('/properties/view', 'Panels\PropertyOwnerController@properties');
    });

    Route::prefix('admin')->group(function () {

        Route::get('/my-account/view', 'Panels\AdminController@myAccountView');
        Route::get('/my-account/edit', 'Panels\AdminController@myAccountEdit');

        Route::get('/payment/show', 'Panels\AdminController@paymentShow');

        Route::get('/property-listing/show', 'Panels\AdminController@propertyListingShow');
        Route::get('/property-listing/view', 'Panels\AdminController@propertyListingView');
        Route::get('/property-listing/edit', 'Panels\AdminController@propertyListingEdit');
        Route::get('/property-listing/add', 'Panels\AdminController@propertyListingAdd');

        Route::get('/requests/show', 'Panels\AdminController@requestsShow');
        Route::get('/requests/view-one-time-user', 'Panels\AdminController@requestsViewOneTimeUser');
        Route::get('/requests/view-tenant', 'Panels\AdminController@requestsViewTenant');
        Route::get('/requests/view-property-owner', 'Panels\AdminController@requestsViewPropertyOwner');
        Route::get('/requests/edit-property-owner', 'Panels\AdminController@requestsEditPropertyOwner');
        Route::get('/requests/edit-tenant', 'Panels\AdminController@requestsEditTenant');
        Route::get('/requests/edit-one-time-user', 'Panels\AdminController@requestsEditOneTimeUser');

        // Route::get('/progress-sheet/create', 'Panels\AdminController@progressSheetCreate');
        // Route::get('/progress-sheet/show', 'Panels\AdminController@progressSheetShow');
        // Route::get('/progress-sheet/view', 'Panels\AdminController@progressSheetView');
        // Route::get('/progress-sheet/edit', 'Panels\AdminController@progressSheetEdit');
        // Route::get('/progress-sheet/duplicate', 'Panels\AdminController@progressSheetDuplicate');

        Route::get('/properties/edit', 'Panels\AdminController@propertiesEdit');
        Route::get('/properties/add', 'Panels\AdminController@propertiesAdd');
        Route::get('/properties/show', 'Panels\AdminController@propertiesShow');
        Route::get('/properties/view', 'Panels\AdminController@propertiesView');

        Route::get('/users/edit', 'Panels\AdminController@usersEdit');
        Route::get('/users/index', 'Panels\AdminController@users');
        Route::get('/users/show', 'Panels\AdminController@usersShow');

        /* User Management */
        Route::get('/user-management/admin/show', 'Panels\AdminController@UserManagementAdminShow');
        Route::get('/user-management/admin/edit', 'Panels\AdminController@UserManagementAdminEdit');
        Route::get('/user-management/admin/add', 'Panels\AdminController@UserManagementAdminAdd');
        Route::get('/user-management/admin/view', 'Panels\AdminController@UserManagementAdminView');

        Route::get('/user-management/one-time-user/show', 'Panels\AdminController@UserManagementOneTimeUserShow');
        Route::get('/user-management/one-time-user/edit', 'Panels\AdminController@UserManagementOneTimeUserEdit');
        Route::get('/user-management/one-time-user/view', 'Panels\AdminController@UserManagementOneTimeUserView');
        Route::get('/user-management/one-time-user/per-property/request-history', 'Panels\AdminController@UserManagementOneTimeUserRequestHistory');
        Route::get('/user-management/one-time-user/per-property/payment-history', 'Panels\AdminController@UserManagementOneTimeUserPaymentHistory');

        Route::get('/user-management/property-owner/show', 'Panels\AdminController@UserManagementPropertyOwnerShow');
        Route::get('/user-management/property-owner/edit', 'Panels\AdminController@UserManagementPropertyOwnerEdit');
        Route::get('/user-management/property-owner/view', 'Panels\AdminController@UserManagementPropertyOwnerView');

        Route::get('/user-management/tenant/show', 'Panels\AdminController@UserManagementTenantShow');
        Route::get('/user-management/tenant/per-property/show', 'Panels\AdminController@UserManagementTenantPerPropertyShow');
        Route::get('/user-management/tenant/per-property/view', 'Panels\AdminController@UserManagementTenantPerPropertyView');
        Route::get('/user-management/tenant/per-property/edit', 'Panels\AdminController@UserManagementTenantPerPropertyEdit');
        Route::get('/user-management/tenant/per-property/request-history', 'Panels\AdminController@UserManagementTenantRequestHistory');
        Route::get('/user-management/tenant/per-property/payment-history', 'Panels\AdminController@UserManagementTenantPaymentHistory');
    });
});

require __DIR__ . '/panel.php';
