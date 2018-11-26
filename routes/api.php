<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function () {
    // Auth
    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');
    });

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        // User
        Route::get('users', 'UserController@index');
        Route::get('users/{user}', 'UserController@show');
        Route::post('users', 'UserController@store');
        Route::put('users/{user}', 'UserController@update');
        Route::delete('users/{user}', 'UserController@delete');

        // File upload
        Route::put('upload/{type}', 'UploadFileController@imageUpload');
    });

    // Blog
    Route::get('blogs', 'BlogController@index');
    Route::get('blogs/{blog}', 'BlogController@show');
    Route::post('blogs', 'BlogController@store');
    Route::put('blogs/{blog}', 'BlogController@update');
    Route::delete('blogs/{blog}', 'BlogController@delete');

    // Configuration
    Route::get('configurations', 'ConfigurationController@index');
    Route::get('configurations/{configuration}', 'ConfigurationController@show');
    Route::post('configurations', 'ConfigurationController@store');
    Route::put('configurations/{configuration}', 'ConfigurationController@update');
    Route::delete('configurations/{configuration}', 'ConfigurationController@delete');

    // Discount
    Route::get('discounts', 'DiscountController@index');
    Route::get('discounts/{discount}', 'DiscountController@show');
    Route::post('discounts', 'DiscountController@store');
    Route::put('discounts/{discount}', 'DiscountController@update');
    Route::delete('discounts/{discount}', 'DiscountController@delete');

    // Home
    Route::get('homes', 'HomeController@index');
    Route::get('homes/slides', 'HomeController@slide');
    Route::get('homes/{home}', 'HomeController@show');
    Route::post('homes', 'HomeController@store');
    Route::put('homes/{home}', 'HomeController@update');
    Route::delete('homes/{home}', 'HomeController@delete');

    // ProductCategory
    Route::get('productCategories', 'ProductCategoryController@index');
    Route::get('productCategories/{productCategory}', 'ProductCategoryController@show');
    Route::post('productCategories', 'ProductCategoryController@store');
    Route::put('productCategories/{productCategory}', 'ProductCategoryController@update');
    Route::delete('productCategories/{productCategory}', 'ProductCategoryController@delete');

    // Product
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::put('products/{product}', 'ProductController@update');
    Route::delete('products/{product}', 'ProductController@delete');

    // ProductItem
    Route::get('productItems', 'ProductItemController@index');
    Route::get('productItems/{productItem}', 'ProductItemController@show');
    Route::post('productItems', 'ProductItemController@store');
    Route::put('productItems/{productItem}', 'ProductItemController@update');
    Route::delete('productItems/{productItem}', 'ProductItemController@delete');

    // ProductSubcategory
    Route::get('productSubcategories', 'ProductSubcategoryController@index');
    Route::get('productSubcategories/{productSubcategory}', 'ProductSubcategoryController@show');
    Route::post('productSubcategories', 'ProductSubcategoryController@store');
    Route::put('productSubcategories/{productSubcategory}', 'ProductSubcategoryController@update');
    Route::delete('productSubcategories/{productSubcategory}', 'ProductSubcategoryController@delete');

    // PurchaseOrder
    Route::get('purchaseOrders', 'PurchaseOrderController@index');
    Route::get('purchaseOrders/{purchaseOrder}', 'PurchaseOrderController@show');
    Route::post('purchaseOrders', 'PurchaseOrderController@store');
    Route::put('purchaseOrders/{purchaseOrder}', 'PurchaseOrderController@update');
    Route::delete('purchaseOrders/{purchaseOrder}', 'PurchaseOrderController@delete');

    // PurchaseOrderReturnApplicationController
    Route::get('purchaseOrderReturnApplications', 'PurchaseOrderReturnApplicationController@index');
    Route::get('purchaseOrderReturnApplications/{purchaseOrderReturnApplication}', 'PurchaseOrderReturnApplicationController@show');
    Route::post('purchaseOrderReturnApplications', 'PurchaseOrderReturnApplicationController@store');
    Route::put('purchaseOrderReturnApplications/{purchaseOrderReturnApplication}', 'PurchaseOrderReturnApplicationController@update');
    Route::delete('purchaseOrderReturnApplications/{purchaseOrderReturnApplication}', 'PurchaseOrderReturnApplicationController@delete');

    // SystemLog
    Route::get('systemLogs', 'SystemLogController@index');
    Route::get('systemLogs/{systemLog}', 'SystemLogController@show');
    Route::post('systemLogs', 'SystemLogController@store');
    Route::put('systemLogs/{systemLog}', 'SystemLogController@update');
    Route::delete('systemLogs/{systemLog}', 'SystemLogController@delete');

    // SystemMail
    Route::get('systemMails', 'SystemMailController@index');
    Route::get('systemMails/{systemMail}', 'SystemMailController@show');
    Route::post('systemMails', 'SystemMailController@store');
    Route::put('systemMails/{systemMail}', 'SystemMailController@update');
    Route::delete('systemMails/{systemMail}', 'SystemMailController@delete');

    // SystemMessage
    Route::get('systemMessages', 'SystemMessageController@index');
    Route::get('systemMessages/{systemMessage}', 'SystemMessageController@show');
    Route::post('systemMessages', 'SystemMessageController@store');
    Route::put('systemMessages/{systemMessage}', 'SystemMessageController@update');
    Route::delete('systemMessages/{systemMessage}', 'SystemMessageController@delete');

    // UserMessage
    Route::get('userMessages', 'UserMessageController@index');
    Route::get('userMessages/{userMessage}', 'UserMessageController@show');
    Route::post('userMessages', 'UserMessageController@store');
    Route::put('userMessages/{userMessage}', 'UserMessageController@update');
    Route::delete('userMessages/{userMessage}', 'UserMessageController@delete');
});
