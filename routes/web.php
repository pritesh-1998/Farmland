<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopPageDataController;
use App\Http\Controllers\BackendController;

use App\Http\Controllers\LeaseController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\farmCropController;
use App\Http\Controllers\farmRegisterController;


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
    Route::any('/dashboard', [BackendController::class, 'index'])->name("dashboard");
    Route::any('/createstock', [BackendController::class, 'createstock'])->name("createstock");
    Route::resource('lease', LeaseController::class);
    Route::resource('crop', CropController::class);
    Route::resource('farm', FarmController::class);
    Route::resource('farm-crop', farmCropController::class);
    Route::resource('register', farmRegisterController::class);
});


Route::any('/shop', [ShopPageDataController::class, 'index'])->name("shop");
Route::any('/get_crops_ajax', [ShopPageDataController::class, 'get_crops_ajax'])->name("get_crops_ajax");
Route::any('/get_quantity_ajax', [ShopPageDataController::class, 'get_quantity_ajax'])->name("get_quantity_ajax");
Route::any('/get_location_ajax', [ShopPageDataController::class, 'get_location_ajax'])->name("get_location_ajax");
Route::any('/fetchfamerproducts', [ShopPageDataController::class, 'fetchfamerproducts'])->name("fetchfamerproducts");
