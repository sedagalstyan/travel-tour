<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPagesTitlesController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminTourController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchToursCotroller;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ToursController;
use App\Models\Destination;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-z]{2}'], 'as' => 'locale.', 'middleware' => 'setLocale'], function() {   
    
    // Pages  
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class,'index'])->name('about');
    Route::get('/destinations', [DestinationsController::class,'index'])->name('destinations');
    Route::get('/destinations/{slug}', [DestinationsController::class, 'destination'])->name('destination');
    Route::get('/tour/{destination}/{tour_id}', [ToursController::class, 'tour'])->name('tour')->where('id', '[0-9]+');
    Route::get('/tours', [ToursController::class,'index'])->name('tours');
    Route::get('/search-tours', [SearchToursCotroller::class,'index'])->name('search-tours');
    Route::get('/contact', [ContactController::class,'index'])->name('contact');
    Route::post('/contact', [ContactController::class,'contact'])->name('contact-msg');
    
    // User
    Route::middleware('guest')->group(function(){
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login-submit');
        Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
        Route::post('/signup', [SignUpController::class, 'store'])->name('signup-submit');
        Route::get('/signup/verification', [VerificationController::class, 'index'])->name('verification');
        Route::post('/signup/verification', [VerificationController::class, 'verificate'])->name('verificate');
        Route::get('/signup/verification/otpcode', [SignUpController::class, 'sendOTPCode'])->name('otpcode');
    });
    Route::middleware('auth')->group(function(){
        Route::resource('profile', ProfileController::class);
        Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
        Route::resource('review', ReviewController::class);
    });

    // Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::middleware('guest:admin')->group(function(){
            Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
            Route::post('/login', [AdminLoginController::class, 'login'])->name('login-submit');
        });
        Route::middleware('auth:admin')->group(function(){
            Route::get('/', [AdminController::class, 'index'])->name('home');
            Route::resource('users', AdminUserController::class);
            Route::resource('pages-titles', AdminPagesTitlesController::class);
            Route::resource('categories', AdminCategoryController::class);
            Route::resource('destinations', AdminDestinationController::class);
            Route::resource('tours', AdminTourController::class);
            Route::get('/logout', [AdminLoginController::class, 'destroy'])->name('logout');
        });
    });

});