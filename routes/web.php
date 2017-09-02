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
    return redirect()->route('login');
});

//Route::get('/home', function() {
	//return redirect()->route('subscription.complete');
//});

/* Routes to handle User registration and login */
Auth::routes();

Route::get('register/complete/{id?}', 'HomeController@showRegistrationCompletionForm')->name('register.complete');
Route::post('register/confirm', 'HomeController@confirmRegistration')->name('register.confirm');

/* Routes to validate settings via the internet */
Route::group(['prefix'=>'confirm', 'namespace'=>'Shared'], function() {
	Route::get('email/{address}','ConfirmController@confirmShowEmail')->name('confirm.show.email');
	Route::get('mobile/{number}','ConfirmController@confirmShowMobile')->name('confirm.show.mobile');
});

/* Routes to subscribe to MDL app or service */
Route::group([ 'prefix'=>'subscribe', 'namespace'=>'Subscribe' ], function() {
	Route::resources([
		'applications'		=> 'ApplicationsController',
		'devices'			=> 'DevicesController',
		'licences'			=> 'LicencesController',
		'organisations'		=> 'OrganisationsController',
		'subscriptions'		=> 'SubscriptionsController'
	]);

	Route::get('applications/licence/{id?}', 'ApplicationsController@licence')->name('application.licence');
	Route::get('applications/attachUser/{id}','ApplicationsController@attachUser')->name('application.attach.user');
	Route::get('applications/detachUser/{id}','ApplicationsController@detachUser')->name('application.detach.user');

	Route::get('devices/subscriptions/{id?}','DevicesController@subscribe')->name('device.subscriptions');
	Route::get('devices/list/{id?}','DevicesController@list')->name('device.list');	

	Route::post('licences/subscribe','LicencesController@subscribe')->name('licences.subscribe');

	Route::get('subscriptions/redirect/{id?}','SubscriptionsController@redirect')->name('subscriptions.redirect');
	Route::get('subscriptions/free/{id?}','SubscriptionsController@showFree')->name('subscriptions.free.show');
	Route::get('subscriptions/organisation/{id?}','SubscriptionsController@showOrganisation')->name('subscriptions.organisation.show');
	Route::get('subscriptions/organisation/{id?}/error','SubscriptionsController@showOrganisationError')->name('subscriptions.organisation.error');
	Route::get('subscriptions/purchase/{id?}','SubscriptionsController@showPurchase')->name('subscriptions.purchase.show');
	Route::get('subscriptions/purchase/{id?}/error','SubscriptionsController@showPurchaseError')->name('subscriptions.purchase.error');

	Route::get('subscriptions/storeFree/{id}','SubscriptionsController@storeFree')->name('subscriptions.free.store');	
	Route::post('subscriptions/organisation','SubscriptionsController@storeOrganisation')->name('subscriptions.organisation.store');
	Route::post('subscriptions/purchase','SubscriptionsController@storePurchase')->name('subscriptions.purchase.store');

	Route::get('subscriptions/devices/{id?}','SubscriptionsController@devices')->name('subscription.devices');
	Route::get('subscriptions/complete/{id?}','SubscriptionsController@complete')->name('subscription.complete');	
});