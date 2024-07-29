
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

Route::get('/shop', [shopController::class, 'index'])->name('shop.index');


// Route pour afficher les produits et le formulaire
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
// Route pour ajouter un produit
Route::post('/product', [ProductController::class, 'store'])->name('product.store');


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
