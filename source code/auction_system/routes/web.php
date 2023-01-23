<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ContactUsFormController;


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
    return view('index');
});




Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/product', [PriceController::class,'index'] )->name('product');

Route::any('/product', [PriceController::class, 'index'])->name('product');
// Route::get('/show_product/{id}', [PriceController::class,'show'] )->name('product');
// Route::get('show/{product}', 'ProductController@show')->name('show');
Route::get('/show_product/{product}/', [PriceController::class, 'show'])->name('show_product');

Route::group(['middleware' => ['auth']], function (){
    Route::post('store/', [PriceController::class, 'store'])->name('store');

    Route::resource('products', ProductController::class);

    Route::get('/prices', [PriceController::class,'price'] )->name('prices');
    Route::delete('/{price}',[PriceController::class,'destroy'])->name('destroy');


});
