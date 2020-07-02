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
    $page = 'home';
    $stocks = App\Models\Transaction::with(['shirt', 'shirt.category', 'shirt.type', 'shirt.size.size', 'shirt.color'])->selectRaw('shirt_id, status_transaction_id, sum(quantity) as quantity')->groupBy('shirt_id', 'status_transaction_id')->get();
        $stock_exist = [];
        foreach ($stocks as $stock) {
            $key = $stock['shirt']['category']->id."-".$stock['shirt']['type']->id."-".$stock['shirt']['size']['size']->id."-".$stock['shirt']['color']->id;
            if (empty($stock_exist[$key][$stock->status_transaction_id])) {
                $stock_exist[$key][$stock->status_transaction_id] = 0;
            }
            $stock_exist[$key][$stock->status_transaction_id] = $stock_exist[$key][$stock->status_transaction_id] + $stock->quantity;
        }
    $shirts = App\Models\Shirt::with(['category', 'type', 'size.size', 'color'])->whereRaw('id IN (select MAX(id) FROM shirts GROUP BY color_id, category_id, type_id, category_size_id)')->orderBy('category_id', 'desc')->orderBy('type_id', 'asc')->orderBy('category_size_id', 'asc')->get();
    return view('welcome', compact(['page', 'stocks', 'shirts', 'stock_exist']));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// shirt
Route::get('/shirt', 'ShirtController@index')->name('shirt');
Route::post('/shirt/create', 'ShirtController@createShirt')->name('createShirt');
Route::post('/shirt/update', 'ShirtController@updateShirt')->name('updateShirt');
Route::post('/shirt/delete', 'ShirtController@deleteShirt')->name('deleteShirt');
Route::get('/shirt/getShirtSizeColor/{category_id}', 'ShirtController@getShirtSizeColor')->name('getShirtSizeColor');

// category
Route::get('/shirt/category', 'CategoryController@index')->name('category');
Route::post('/shirt/category/create', 'CategoryController@createCategory')->name('createCategory');
Route::post('/shirt/category/update', 'CategoryController@updateCategory')->name('updateCategory');
Route::post('/shirt/category/delete', 'CategoryController@deleteCategory')->name('deleteCategory');

// type
Route::get('/shirt/type', 'TypeController@index')->name('type');
Route::post('/shirt/type/create', 'TypeController@createType')->name('createType');
Route::post('/shirt/type/update', 'TypeController@updateType')->name('updateType');
Route::post('/shirt/type/delete', 'TypeController@deleteType')->name('deleteType');

// color
Route::get('/shirt/color', 'ColorController@index')->name('color');
Route::post('/shirt/color/create', 'ColorController@createColor')->name('createColor');
Route::post('/shirt/color/update', 'ColorController@updateColor')->name('updateColor');
Route::post('/shirt/color/delete', 'ColorController@deleteColor')->name('deleteColor');

// size
Route::get('/shirt/size', 'SizeController@index')->name('size');
Route::post('/shirt/size/create', 'SizeController@createSize')->name('createSize');
Route::post('/shirt/size/update', 'SizeController@updateSize')->name('updateSize');
Route::post('/shirt/size/delete', 'SizeController@deleteSize')->name('deleteSize');

// category size
Route::post('/shirt/category-size/create', 'SizeController@createCategorySize')->name('createCategorySize');
Route::post('/shirt/category-size/update', 'SizeController@updateCategorySize')->name('updateCategorySize');
Route::post('/shirt/category-size/delete', 'SizeController@deleteCategorySize')->name('deleteCategorySize');

// transaction
Route::get('/transaction', 'TransactionController@index')->name('transaction');
Route::post('/transaction/create', 'TransactionController@createTransaction')->name('createTransaction');
Route::post('/transaction/update', 'TransactionController@updateTransaction')->name('updateTransaction');
Route::post('/transaction/delete', 'TransactionController@deleteTransaction')->name('deleteTransaction');

// stock
Route::get('/stock', 'StockController@index')->name('stock');
