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

Route::get('/', function (){
    return view('homage');
})->name('welcome');

Route::get('/aboutus', 'WebsiteController@aboutus')->name('aboutus');
Route::get('/services', 'WebsiteController@services')->name('services');
Route::get('/gallery', 'WebsiteController@gallery')->name('gallery');
Route::get('/contactus', 'WebsiteController@contactus')->name('contactus');
Route::get('/charter', 'WebsiteController@charter')->name('charter');
Route::get('/service_charter', 'WebsiteController@service_charter')->name('service_charter');
Route::get('/credit_cert', 'WebsiteController@credit_cert')->name('credit_cert');

Route::get('/mostselling', 'OrderProductController@index')->name('mostselling')->middleware(['role:admin', 'auth']);
Route::get('/orderitems', 'OrderProductController@allItems')->name('orderitems')->middleware(['role:admin', 'auth']);
Route::get('/servicesreport/excel', 'OrderProductController@exportServicesReport')->name('servicesreport.excel');
Route::post('/checkreport', 'OrderProductController@checkReport')->name('checkreport')->middleware(['role:admin', 'auth']);


Route::get('/products', 'WebsiteController@allProducts')->name('allproducts');
Route::get('/allfeedback', 'WebsiteController@showFeedback')->name('allfeedback')->middleware(['role:staff', 'auth']);
Route::get('/allfeedback/{id}', 'WebsiteController@showClientForm')->name('clientform')->middleware(['role:staff', 'auth']);
Route::get('/feedback', 'WebsiteController@feedback')->name('feedback');
Route::post('/feedback', 'WebsiteController@submitFeedback')->name('submitfeedback');
Route::post('/inquiry', 'WebsiteController@submitInquiry')->name('submitinquiry');

Route::resource('adminproducts', ProductController::class)->middleware(['role:staff', 'auth']);

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/add-product/{id}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

    Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

    Route::get('/my-orders', 'OrderController@index')->name('my-orders.index');
    Route::get('/my-orders/{id}', 'OrderController@clientViewSingleOrder')->name('my-orders.show');
});


Route::get('/orderschart', 'OrderController@viewOrdersChart')->name('orderschart')->middleware(['role:admin', 'auth']);
Route::get('/ordersreport', 'OrderController@viewOrdersReport')->name('ordersreport')->middleware(['role:admin', 'auth']);
Route::get('/ordersreport/excel', 'OrderController@exportOrdersReport')->name('ordersreport.excel')->middleware(['role:admin', 'auth']);

Route::get('/my-orders/signed/{id}', 'OrderController@signed')->name('my-orders.signed')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/signed/{id}', 'OrderController@uploadSigned')->name('my-orders.upload-signed')->middleware(['role:user', 'auth']);

Route::get('/my-orders/payment/{id}', 'OrderController@payment')->name('my-orders.payment')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/payment/{id}', 'OrderController@uploadPayment')->name('my-orders.upload-payment')->middleware(['role:user', 'auth']);
Route::get('/my-orders/paymentone/{id}', 'OrderController@paymentone')->name('my-orders.paymentone')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/paymentone/{id}', 'OrderController@uploadPaymentOne')->name('my-orders.upload-paymentone')->middleware(['role:user', 'auth']);

Route::get('/all-orders', 'OrderController@allorders')->name('all-orders.index')->middleware(['role:staff', 'auth']);
Route::get('/all-orders/show/{id}', 'OrderController@staffViewSingleOrder')->name('all-orders.show')->middleware(['role:staff', 'auth']);
Route::get('/all-orders/{id}', 'OrderController@edit')->name('all-orders.edit')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/{id}', 'OrderController@update')->name('all-orders.update')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/reject/{id}', 'OrderController@getReject')->name('all-orders.getreject')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/reject/{id}', 'OrderController@rejectOrder')->name('all-orders.reject')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/budget/{id}', 'OrderController@budget')->name('all-orders.budget')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/budget/{id}', 'OrderController@uploadBudget')->name('all-orders.upload-budget')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/invoice/{id}', 'OrderController@invoice')->name('all-orders.invoice')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/invoice/{id}', 'OrderController@uploadInvoice')->name('all-orders.upload-invoice')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/service/{id}', 'OrderController@service')->name('all-orders.service')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/service/{id}', 'OrderController@uploadService')->name('all-orders.upload-service')->middleware(['role:staff', 'auth']);

Route::get('/all-order-items/{id}', 'OrderController@editItemStatus')->name('all-order-items.edit')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/{id}', 'OrderController@updateItemStatus')->name('all-order-items.update')->middleware(['role:staff', 'auth']);
Route::get('/all-order-items/result/{id}', 'OrderController@itemResult')->name('all-order-items.result')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/result/{id}', 'OrderController@uploadItemResult')->name('all-order-items.upload-result')->middleware(['role:staff', 'auth']);
Route::get('/all-order-items/rawdata/{id}', 'OrderController@itemRawdata')->name('all-order-items.rawdata')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/rawdata/{id}', 'OrderController@uploadItemRawdata')->name('all-order-items.upload-rawdata')->middleware(['role:staff', 'auth']);

Route::get('/payment/download/{payment}', 'OrderController@downloadPayment');
Route::get('/paymentone/download/{paymentone}', 'OrderController@downloadPaymentOne');

Route::get('/signed/download/{signed}', 'OrderController@downloadSigned');

Route::get('/budget/download/{budget}', 'OrderController@downloadBudget');
Route::get('/budget/download/{invoice}', 'OrderController@downloadInvoice');
Route::get('/service/download/{service}', 'OrderController@downloadService');
Route::get('/item_result/download/{item_result}', 'OrderController@downloadItemResult');
Route::get('/item_rawdata/download/{item_rawdata}', 'OrderController@downloadItemRawdata');

Route::post('search-orders', 'OrderController@search')->middleware(['role:staff', 'auth']);

Auth::routes();

Route::get('/users', 'UsersController@getAllUsers')->middleware(['role:admin', 'auth']);
Route::get('/userschart', 'UsersController@viewUsersChart')->name('userschart')->middleware(['role:admin', 'auth']);
Route::post('search-users', 'UsersController@search')->middleware(['role:admin', 'auth']);
Route::get('/assign/role/{user_id}', 'UsersController@getAssignRole')->middleware(['role:admin', 'auth']);
Route::post('/assign/role/{user_id}', 'UsersController@assignRole')->name('assignRole')->middleware(['role:admin', 'auth']);
Route::get('/remove/role/{user_id}', 'UsersController@getRemoveRole')->middleware(['role:admin', 'auth']);
Route::post('/remove/role/{user_id}', 'UsersController@removeRole')->name('removeRole')->middleware(['role:admin', 'auth']);

Route::get('/useraccount', 'UseraccountController@index');
Route::get('/useraccount/edit', 'UseraccountController@edit');
Route::post('/useraccount/{id}/edit', 'UseraccountController@update')->name('editProfile');
Route::get('/change/password', 'UseraccountController@changePassword');
Route::post('/change/password', 'UseraccountController@postChangePassword')->name('changePassword');



Route::get('/home', 'HomeController@index')->name('home');
