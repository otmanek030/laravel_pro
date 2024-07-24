
<?php
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\product_cont;
use App\Livewire\Aboutus;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\HomePage;
use App\Livewire\login;
use App\Livewire\Open;
use App\Livewire\Product;
use App\Livewire\service;
use App\Livewire\shop;
use App\Livewire\signin;
use App\Livewire\Users;
use App\Models\User;
use App\View\Components\signinLayout;
use Illuminate\Support\Facades\Route;

// Route::get('/', HomePage::class);
Route::middleware("auth")->group(function(){
    Route::view('/', "App")->name("home");
});

Route::get('/users', Users::class);
Route::get('/shop', shop::class);
Route::get('/aboutus', Aboutus::class);
Route::get('/contact', Contact::class);
Route::get('/service', Service::class);
Route::get('/signin', signin::class);
Route::get('/login1', login::class);

Route::get('/home', Home::class);

Route::get('/open', Open::class);
// Route::get('/product', Product::class);

use App\Http\Controllers\ProductController;


Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::post('/product', [ProductController::class, 'productPost'])->name('product.post');


Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [Authcontroller::class,"loginPost"])
->name("login.post");

Route::get('/signup', [Authcontroller::class, "signup"])->name('signup');
Route::post('/signup', [AuthController::class, "signupPost"])   ->name('signup.post');


// Route::get('/register', [AuthController::class,"login"]);


Route::get('/dbconn', function () {
    dd(User::factory()->create(2));
    return view('dbconn');
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
