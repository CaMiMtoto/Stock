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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@signIn')->name('signIn');


Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        Route::post('/logout', 'UsersController@logout')->name('logout');

        Route::get('/categories', 'CategoriesController@index')->name('categories.all');
        Route::post('/categories', 'CategoriesController@store')->name('category.store');
        Route::get('/categories/{category}', 'CategoriesController@show')->name('category.show');
        Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('category.destroy');

        Route::get('/products', 'ProductsController@index')->name('products.all');
        Route::post('/products', 'ProductsController@store')->name('products.store');
        Route::get('/products/{product}', 'ProductsController@show')->name('products.show');
        Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');
        Route::get('/products/category/{categoryId}', 'ProductsController@byCategory')->name('products.byCategory');

        Route::get('/suppliers', 'SuppliersController@index')->name('suppliers.all');
        Route::post('/suppliers', 'SuppliersController@store')->name('suppliers.store');
        Route::get('/suppliers/{supplier}', 'SuppliersController@show')->name('suppliers.show');
        Route::delete('/suppliers/{supplier}', 'SuppliersController@destroy')->name('suppliers.destroy');

        Route::get('/stock', 'StocksController@index')->name('stocks.all');
        Route::post('/stock', 'StocksController@store')->name('stocks.store');
        Route::get('/stock/{stock}', 'StocksController@show')->name('stocks.show');
        Route::delete('/stock/{stock}', 'StocksController@destroy')->name('stocks.destroy');

        Route::get('/requisitions', 'RequisitionsController@index')->name('requisitions.all');
        Route::get('/requests', 'RequisitionsController@requests')->name('requests');
        Route::post('/requisitions', 'RequisitionsController@store')->name('requisitions.store');
        Route::post('/requisitions/{requisition}', 'RequisitionsController@update')->name('requisitions.update');
        Route::get('/requisitions/{requisition}', 'RequisitionsController@show')->name('requisitions.show');
        Route::patch('/requisitions/{requisition}', 'RequisitionsController@confirm')->name('requisitions.confirm');

        Route::get('/menus', 'MenusController@index')->name('menus.all');
        Route::post('/menus', 'MenusController@store')->name('menus.store');
        Route::get('/menus/{menu}', 'MenusController@show')->name('menus.show');
        Route::delete('/menus/{menu}', 'MenusController@destroy')->name('menus.destroy');
        Route::get('/menus/items/{menu}', 'MenusController@menuItems')->name('menus.items');
        Route::post('/menus/items/{menu}', 'MenusController@addMenuItem')->name('menus.addItems');
        Route::delete('/menus/items/{menuItem}', 'MenusController@removeItem')->name('menus.removeItem');

        Route::get('/orders', 'OrdersController@index')->name('orders.index');
        Route::get('/orders/create', 'OrdersController@create')->name('orders.create');
        Route::post('/orders', 'OrdersController@store')->name('orders.store');
        Route::get('/orders/{order}', 'OrdersController@show')->name('orders.show');
        Route::get('/orders/{order}/details', 'OrdersController@orderDetails')->name('orders.orderDetails');
        Route::get('/orders/{order}/edit', 'OrdersController@edit')->name('orders.edit');
        Route::put('/orders/{order}', 'OrdersController@update')->name('orders.update');
        Route::get('/orders/{order}', 'OrdersController@print')->name('orders.print');

        Route::get('/expenses', 'ExpenseController@index')->name('expenses.all');
        Route::post('/expenses', 'ExpenseController@store')->name('expenses.store');
        Route::get('/expenses/{expense}', 'ExpenseController@show')->name('expenses.show');
        Route::delete('/expenses/{expense}', 'ExpenseController@destroy')->name('expenses.destroy');

        Route::get('/reports', 'ReportsController@index')->name('reports');

    });
});





