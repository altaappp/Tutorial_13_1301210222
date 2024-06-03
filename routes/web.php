<?php

use Illuminate\Support\Facades\Route;

Route::get('/lat1', 'App\Http\Controllers\Lat1Controller@index');
Route::get('/lat1/m2', 	'App\Http\Controllers\Lat1Controller@method2');

use App\Http\Controllers\ProductController;

// Routes for displaying products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route for storing a new product (submitting the form)
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route for deleting a product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

use Illuminate\Support\Facades\Auth;

Route::match(['get', 'post'], '/login', function () {
    if (Auth::check()) {
        return redirect('/products'); // Redirect to /products if the user is already authenticated
    } else {
        if (request()->isMethod('post')) {
            // If the request is a POST (i.e., form submission), attempt to authenticate the user
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                // If authentication is successful, redirect to /products
                return redirect('/products');
            } else {
                // If authentication fails, redirect back to the login form with an error message
                return redirect('/login')->with('msg', 'Invalid email or password.');
            }
        } else {
            // If the request is a GET (i.e., accessing the login page), show the login form
            return view('login');
        }
    }
})->name('login');

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/login');
});

use App\Http\Controllers\SiteController;

Route::get('/create-user', [SiteController::class, 'createUser'])->name('user.create');
Route::get('/test', function () {
    return 'Test Route';
});
