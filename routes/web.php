
<?php
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\shopController;
use App\Livewire\Aboutus;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\login;
use App\Livewire\Open;
use App\Livewire\service;
use App\Livewire\signin;
use App\Livewire\Users;
use App\Models\User;;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/users', Users::class);
Route::get('/aboutus', Aboutus::class);
Route::get('/service', Service::class);
Route::get('/signin', signin::class);
Route::get('/login1', login::class);

Route::get('/open', Open::class);


Route::get('/contact', [contactController::class, 'index'])->name('contact.index');
// Route pour ajouter un produit
Route::post('/contact', [contactController::class, 'store'])->name('contact.store');

//for the shop
Route::get('/shop', [shopController::class, 'index'])->name('shop.index');
Route::post('/shop/select/{id}', [ShopController::class, 'select'])->name('shop.select');

// for the products
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/products/store', 'ProductController@store')->name('products.store');


Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [Authcontroller::class,"loginPost"])
->name("login.post");

Route::get('/signup', [Authcontroller::class, "signup"])->name('signup');
Route::post('/signup', [AuthController::class, "signupPost"])   ->name('signup.post');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
