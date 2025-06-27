<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockPriceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

// Add routes for controllers
Route::middleware(['auth'])->group(function () {
    Route::resource('businesses', BusinessController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('stock-prices', StockPriceController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailController::class);
});

Route::post('/test-business-endpoint', function (Request $request) {
    // Simulate handling form submission since controllers are stubbed
    // View would normally submit directly to business controller
    return response()->json([
        'message' => 'Business "' . $request->name . '" submitted successfully.',
    ]);
})->middleware(['auth']);

//Test form using dummy create route
Route::get('/businesses/create', function () {
    return Inertia::render('Businesses/Create');
})->middleware(['auth']);
