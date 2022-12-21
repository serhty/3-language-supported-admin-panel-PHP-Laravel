<?php

use Illuminate\Support\Facades\Route;

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

Route::get('locale/{locale?}', array('as'=>'set-locale','uses'=>'App\Http\Controllers\LangController@changeLang'));
Route::get('/panel/locale/{locale?}', array('as'=>'set-locale','uses'=>'App\Http\Controllers\LangController@changeLang_admin'));

Route::get('/panel','App\Http\Controllers\Admin\LoginController@login')->name('admin.login');
Route::post('/panel','App\Http\Controllers\Admin\LoginController@login_check')->name('admin.login_check');

Route::prefix('panel')->name('admin.')->middleware('admin')->group(function(){
    Route::get('/home','App\Http\Controllers\Admin\HomeController@index')->name('home');
    Route::resource('settings','App\Http\Controllers\Admin\SettingsController');
    Route::resource('contact','App\Http\Controllers\Admin\ContactController');
    Route::resource('admin','App\Http\Controllers\Admin\AdminsController');
    Route::resource('blog','App\Http\Controllers\Admin\BlogsController');
    Route::resource('category','App\Http\Controllers\Admin\CategoriesController');
    Route::resource('headerMenu','App\Http\Controllers\Admin\HeaderMenuController');
    Route::resource('footerMenu','App\Http\Controllers\Admin\FooterMenuController');
    Route::resource('customer','App\Http\Controllers\Admin\CustomersController');
    Route::get('/payment/{id}','App\Http\Controllers\Admin\CustomerPaymentsController@payment')->name('payment');
    Route::post('/paymentAdd/{id}','App\Http\Controllers\Admin\CustomerPaymentsController@paymentAdd')->name('paymentAdd');
    Route::get('/paymentDelete/{id?}/{customerId?}','App\Http\Controllers\Admin\CustomerPaymentsController@paymentDelete')->name('paymentDelete');
    Route::get('/sale/{id}','App\Http\Controllers\Admin\CustomerSalesController@sale')->name('sale');
    Route::post('/saleAdd/{id}','App\Http\Controllers\Admin\CustomerSalesController@saleAdd')->name('saleAdd');
    Route::get('/saleDelete/{id?}/{customerId?}','App\Http\Controllers\Admin\CustomerSalesController@saleDelete')->name('saleDelete');
    Route::get('/debt/{id}','App\Http\Controllers\Admin\CustomerDebtsController@debt')->name('debt');
    Route::post('/debtAdd/{id}','App\Http\Controllers\Admin\CustomerDebtsController@debtAdd')->name('debtAdd');
    Route::get('/debtDelete/{id?}/{customerId?}','App\Http\Controllers\Admin\CustomerDebtsController@debtDelete')->name('debtDelete');
    Route::resource('page','App\Http\Controllers\Admin\PagesController');
    Route::resource('gallery','App\Http\Controllers\Admin\GalleryController');
    Route::resource('note','App\Http\Controllers\Admin\NotesController');
    Route::resource('product','App\Http\Controllers\Admin\ProductsController');
    Route::resource('slider','App\Http\Controllers\Admin\SlidersController');
    Route::resource('story','App\Http\Controllers\Admin\StoriesController');
    Route::resource('support','App\Http\Controllers\Admin\SupportsController');
    Route::resource('selling','App\Http\Controllers\Admin\SalesController');
    Route::resource('latestTransaction','App\Http\Controllers\Admin\LatestTransactionsController');
    Route::resource('order','App\Http\Controllers\Admin\OrdersController');
    Route::get('/logout','App\Http\Controllers\Admin\LoginController@logout')->name('logout');
});