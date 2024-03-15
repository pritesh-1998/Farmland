<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopPageDataController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::any('/shop', [ShopPageDataController::class, 'index'])->name("shop");
Route::any('/get_crops_ajax', [ShopPageDataController::class, 'get_crops_ajax'])->name("get_crops_ajax");
Route::any('/get_quantity_ajax', [ShopPageDataController::class, 'get_quantity_ajax'])->name("get_quantity_ajax");
Route::any('/get_location_ajax', [ShopPageDataController::class, 'get_location_ajax'])->name("get_location_ajax");
