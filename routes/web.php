<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login to system
Route::get('/',function (){
    return view('admin.login');
})->middleware('guest');
Route::group(['prefix'=>'admin','middleware'=>['auth','checkPermission','checkStatus']],function (){
    //admin
    Route::group(['controller'=>AdminController::class],function (){
        Route::get('show-admins','index')->name('showAdmins');
        Route::get('create-admin','create')->name('createAdmin');
        Route::post('store','store')->name('storeAdmin');
        Route::get('profile/edit/{id}','profile')->name('editProfile');
        Route::Post('profile/update','update')->name('updateProfile');
        Route::get('profile','profile')->name('adminProfile');
        Route::get('delete/{id}','delete')->name('deleteAdmin');
        Route::post('status','status')->name('adminStatus');
    });
    //category
    Route::group(['controller'=>CategoryController::class],function (){
        Route::get('category','index')->name('showCategory');
        Route::post('category/store','store')->name('storeCategory');
        Route::post('category/update','update')->name('updateCategory');
        Route::get('category/delete/{id}','delete')->name('deleteCategory');
    });
//city
    Route::group(['controller'=>CityController::class],function (){
        Route::get('city','index')->name('showCity');
        Route::post('city/store','store')->name('storeCity');
        Route::post('city/update','update')->name('updateCity');
        Route::get('city/delete/{id}','delete')->name('deleteCity');
    });
    //region
    Route::group(['controller'=>RegionController::class],function (){
        Route::get('city/region/{id}','index')->name('showRegion');
        Route::post('city/region/store','store')->name('storeRegion');
        Route::get('city/region/delete/{id}','delete')->name('deleteRegion');
        Route::post('city/region/update','update')->name('updateRegion');
    });

   //client
    Route::group(['controller'=>ClientController::class],function (){
        Route::get('client','index')->name('showClient');
        Route::get('client/delete/{id}','delete')->name('deleteClient');
        Route::get('client/status/{id}','status')->name('clientStatus');

    });

    //contact us
    Route::group(['controller'=>ContactUsController::class],function (){
        Route::get('contact-us','index')->name('showContact');
        Route::get('contact-us/delete/{id}','delete')->name('deleteContact');
    });

    //setting
    Route::group(['controller'=>SettingController::class],function (){
        Route::get('setting','index')->name('showSetting');
        Route::get('setting/delete/{id}','delete')->name('deleteSetting');
        Route::POST('setting/store','store')->name('storeSetting');
        Route::POST('setting/update','update')->name('updateSetting');
    });

    //payment type
    Route::group(['controller'=>PaymentController::class],function (){
        Route::get('payment','index')->name('showPayment');
        Route::get('payment/delete/{id}','delete')->name('deletePayment');
        Route::POST('payment/store','store')->name('storePayment');
        Route::POST('payment/update','update')->name('updatePayment');
    });

    //restaurant
    Route::group(['controller'=>RestaurantController::class],function (){
        Route::get('restaurants','index')->name('showRestaurant');
        Route::get('restaurant/delete/{id}','delete')->name('deleteRestaurant');
        Route::post('restaurant/status','status')->name('restaurantStatus');
        Route::get('restaurant/profile/{id}','profile')->name('restaurantProfile');
    });

   //role
    Route::resource('roles', RoleController::class);
});
Auth::routes(['register'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

