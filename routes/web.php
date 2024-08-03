<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Livewire\Aboutus;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Open;
use App\Livewire\Service;
use App\Livewire\Signin;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/users', Users::class);
Route::get('/aboutus', Aboutus::class);
Route::get('/service', Service::class);
Route::get('/signin', Signin::class);
Route::get('/login1', Login::class);
Route::get('/open', Open::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Shop routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/select/{id}', [ShopController::class, 'select'])->name('shop.select');

// Authentication routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');

// Middleware protected routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware' => ['auth', 'role:client']], function () {
    Route::get('/client-dashboard', [ClientController::class, 'index'])->name('client.dashboard');
});

// Product routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

// Dashboard route for authenticated users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
