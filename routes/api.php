<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

// Define resource route for products
Route::resource('products', ProductController::class)->except([
    'create', 'edit'
]);

Route::resource('/products', [ProductController::class, 'getAllProducts']);
Route::get('/test', function () {
    return 'Test Route';
});

