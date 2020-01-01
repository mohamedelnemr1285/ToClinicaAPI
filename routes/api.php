<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});




//Users - Admin :

    Route::post('login', 'API\UserController@login');
    Route::post('register', 'API\UserController@register');
    Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});


/**
 * Show all/paginate -> /show
 * Show single details -> /details/id
 * Add -> /create
 * Edit -> /edit/id
 * Delete -> /delete/{id}
 */


Advertisement :

Route::group(['prefix' => 'advertisements', 'as' => 'advertisements.'], function () {
    Route::post('/show', 'Api\AdvertisementController@index');
    Route::post('/details/{id}', 'Api\AdvertisementController@show');
    Route::post('/create', 'Api\AdvertisementController@store');
    Route::post('/edit/{id}', 'Api\AdvertisementController@update');
    Route::post('/delete/{id}', 'Api\AdvertisementController@destroy');
});

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('advertisements/show', 'Api\AdvertisementController@index');
//    Route::get('advertisements/details/{id}', 'Api\AdvertisementController@show');
//    Route::post('advertisements/create', 'Api\AdvertisementController@store');
//    Route::put('advertisements/edit/{id}', 'Api\AdvertisementController@update');
//    Route::delete('advertisements/delete/{advertisements}', 'Api\AdvertisementController@destroy');
//
//});


ADS :

Route::group(['prefix' => 'ads', 'as' => 'advertisements.'], function () {
    Route::post('/show', 'Api\ADSController@index');
    Route::post('/details/{id}', 'Api\ADSController@show');
    Route::post('/create', 'Api\ADSController@store');
    Route::post('/edit/{id}', 'Api\ADSController@update');
    Route::post('/delete/{id}', 'Api\ADSController@destroy');
});



//appointments :

Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function () {
    Route::post('/show', 'Api\AppointmentsController@index');
    Route::post('/details/{id}', 'Api\AppointmentsController@show');
    Route::post('/create', 'Api\AppointmentsController@store');
    Route::post('/edit/{id}', 'Api\AppointmentsController@update');
    Route::post('/delete/{id}', 'Api\AppointmentsController@destroy');
});


//Booking :

Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {
    Route::post('/show', 'Api\BookingController@index');
    Route::post('/details/{id}', 'Api\BookingController@show');
    Route::post('/create', 'Api\BookingController@store');
    Route::post('/edit/{id}', 'Api\BookingController@update');
    Route::post('/delete/{id}', 'Api\BookingController@destroy');
});


//Booking_item :

Route::group(['prefix' => 'bookings/items', 'as' => 'bookings/items.'], function () {
    Route::post('/show', 'Api\BookingController@index_booking_item');
    Route::post('/details/{id}', 'Api\BookingController@show_booking_item');
    Route::post('/create', 'Api\BookingController@store_booking_item');
    Route::post('/edit/{id}', 'Api\BookingController@update_booking_item');
    Route::post('/delete/{id}', 'Api\BookingController@destroy_booking_item');
});


//Cities


Route::group(['prefix' => 'cities', 'as' => 'cities.'], function () {
    Route::post('/show', 'Api\CityController@index');
    Route::post('/details/{id}', 'Api\CityController@show');
    Route::post('/create', 'Api\CityController@store');
    Route::post('/edit/{id}', 'Api\CityController@update');
    Route::post('/delete/{id}', 'Api\CityController@destroy');
});

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('cities/show', 'Api\CityController@index');
//    Route::get('cities/details/{id}', 'Api\CityController@show');
//    Route::post('cities/create', 'Api\CityController@store');
//    Route::put('cities/edit/{id}', 'Api\CityController@update');
//    Route::delete('cities/delete/{id}', 'Api\CityController@destroy');
//});


Clinic :

Route::group(['prefix' => 'clinics', 'as' => 'clinics.'], function () {
    Route::post('/search', 'Api\ClinicController@search');
    Route::post('/show', 'Api\ClinicController@index');
    Route::post('/details/{id}', 'Api\ClinicController@show');
    Route::post('/create', 'Api\ClinicController@store');
    Route::post('/edit/{id}', 'Api\ClinicController@update');
    Route::post('/delete/{id}', 'Api\ClinicController@destroy');


  //  Route::get('/search', 'Api\ParentController@Search');


    });

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('clinics/show', 'Api\ClinicController@index');
//    Route::get('clinics/details/{id}', 'Api\ClinicController@show');
//    Route::post('clinics/create', 'Api\ClinicController@store');
//    Route::put('clinics/edit/{id}', 'Api\ClinicController@update');
//    Route::delete('clinics/delete/{id}', 'Api\ClinicController@destroy');
//});


//Discount :

Route::group(['prefix' => 'discount', 'as' => 'discount.'], function () {
    Route::post('/show', 'Api\DiscountController@index');
    Route::post('/details/{id}', 'Api\DiscountController@show');
    Route::post('/create', 'Api\DiscountController@store');
    Route::post('/edit/{id}', 'Api\DiscountController@update');
    Route::post('/delete/{id}', 'Api\DiscountController@destroy');
});


//Doctor :

Route::group(['prefix' => 'doctors', 'as' => 'doctors.'], function () {
    Route::post('/search', 'Api\DoctorController@search');
    Route::post('/show', 'Api\DoctorController@index');
    Route::post('/details/{id}', 'Api\DoctorController@show');
    Route::post('/create', 'Api\DoctorController@store');
    Route::post('/edit/{id}', 'Api\DoctorController@update');
    Route::post('/delete/{id}', 'Api\DoctorController@destroy');
});


//Patient :

Route::group(['prefix' => 'patients', 'as' => 'patients.'], function () {
    Route::post('/show', 'Api\PatientController@index');
    Route::post('/details/{id}', 'Api\PatientController@show');
    Route::post('/create', 'Api\PatientController@store');
    Route::post('/edit/{id}', 'Api\PatientController@update');
    Route::post('/delete/{id}', 'Api\PatientController@destroy');
});


//Services :

Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
    Route::post('/show', 'Api\ServiceController@index');
    Route::post('/details/{id}', 'Api\ServiceController@show');
    Route::post('/create', 'Api\ServiceController@store');
    Route::post('/edit/{id}', 'Api\ServiceController@update');
    Route::post('/delete/{id}', 'Api\ServiceController@destroy');
});

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('services/show', 'Api\ServiceController@index');
//    Route::get('services/details/{id}', 'Api\ServiceController@show');
//    Route::post('services/create', 'Api\ServiceController@store');
//    Route::put('services/edit/{id}', 'Api\ServiceController@update');
//    Route::delete('services/delete/{id}', 'Api\ServiceController@destroy');
//});


//Service_name :

Route::group(['prefix' => 'services/name', 'as' => 'services/name.'], function () {
  //  Route::post('/translations', 'Api\ServiceController@translations');
    Route::post('/show', 'Api\ServiceController@index_services_name');
    Route::post('/details/{id}', 'Api\ServiceController@show_services_name');
    Route::post('/create', 'Api\ServiceController@store_services_name');
    Route::post('/edit/{id}', 'Api\ServiceController@update_services_name');
    Route::post('/delete/{id}', 'Api\ServiceController@destroy_services_name');
});


//Specialties :

Route::group(['prefix' => 'specialties', 'as' => 'specialties.'], function () {
    Route::post('/show', 'Api\SpecialtyController@index');
    Route::post('/details/{id}', 'Api\SpecialtyController@show');
    Route::post('/create', 'Api\SpecialtyController@store');
    Route::post('/edit/{id}', 'Api\SpecialtyController@update');
    Route::post('/delete/{id}', 'Api\SpecialtyController@destroy');
});

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('specialties/show', 'Api\SpecialtyController@index');
//    Route::get('specialties/details/{id}', 'Api\SpecialtyController@show');
//    Route::post('specialties/create', 'Api\SpecialtyController@store');
//    Route::put('specialties/edit/{id}', 'Api\SpecialtyController@update');
//    Route::delete('specialties/delete/{id}', 'Api\SpecialtyController@destroy');
//});



//Type_of_specialties :

Route::group(['prefix' => 'types', 'as' => 'types.'], function () {
    Route::post('/show', 'Api\TypeOfspecialtyController@index');
    Route::post('/details/{id}', 'Api\TypeOfspecialtyController@show');
    Route::post('/create', 'Api\TypeOfspecialtyController@store');
    Route::post('/edit/{id}', 'Api\TypeOfspecialtyController@update');
    Route::post('/delete/{id}', 'Api\TypeOfspecialtyController@destroy');
});

//Route::group(['middleware' => 'auth:api'], function(){
//    Route::get('types/show', 'Api\TypeOfspecialtyController@index');
//    Route::get('types/details/{id}', 'Api\TypeOfspecialtyController@show');
//    Route::post('types/create', 'Api\TypeOfspecialtyController@store');
//    Route::put('types/edit/{id}', 'Api\TypeOfspecialtyController@update');
//    Route::delete('types/delete/{id}', 'Api\TypeOfspecialtyController@destroy');
//});



//Users :

//Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
//    Route::post('/show', 'Api\UserController@index');
//    Route::post('/details/{id}', 'Api\UserController@show');
//    Route::post('/create', 'Api\UserController@store');
//    Route::post('/edit/{id}', 'Api\UserController@update');
//    Route::post('/delete/{users}', 'Api\UserController@destroy');
//});




