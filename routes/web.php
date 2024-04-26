<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopPageDataController;
use App\Http\Controllers\BackendController;

use App\Http\Controllers\LeaseController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\farmCropController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\farmRegisterController;
use App\Http\Controllers\BidController;



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
    Route::any('/loadSchemePage', [BackendController::class, 'loadSchemePage'])->name("loadSchemePage");
    Route::any('/addSchemes', [BackendController::class, 'addSchemes'])->name("addSchemes");
    Route::any('/bid', [BidController::class, 'makeBid'])->name("makeBid");
    Route::any('/submitBid', [BidController::class, 'submitBid'])->name("submitBid");


    
    Route::resource('lease', LeaseController::class);
    Route::resource('crop', CropController::class);
    Route::resource('farm', FarmController::class);
    Route::resource('farm-crop', farmCropController::class);
    Route::resource('register', farmRegisterController::class);
    Route::any('/ajaxcallforfarm', [FarmController::class, 'ajaxcallforfarm'])->name("ajaxcallforfarm");

});


Route::any('/shop', [ShopPageDataController::class, 'index'])->name("shop");
Route::any('/get_crops_ajax', [ShopPageDataController::class, 'get_crops_ajax'])->name("get_crops_ajax");
Route::any('/get_quantity_ajax', [ShopPageDataController::class, 'get_quantity_ajax'])->name("get_quantity_ajax");
Route::any('/get_location_ajax', [ShopPageDataController::class, 'get_location_ajax'])->name("get_location_ajax");
Route::any('/fetchfamerproducts', [ShopPageDataController::class, 'fetchfamerproducts'])->name("fetchfamerproducts");
Route::any('/cropsPrice', [ProductController::class, 'getCrops'])->name("getCrops");
Route::any('/getCropData', [ProductController::class, 'getCropData'])->name("getCropData");
Route::any('/weather', [GeneralController::class, 'getWeather'])->name("getWeather");
Route::any('/schemes', [GeneralController::class, 'getSchems'])->name("getSchems");



