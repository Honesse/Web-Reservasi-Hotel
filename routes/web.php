<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminTransController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminConfirmController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "Profile",
        "name" => "Admin Tamvan",
        "email" => "admintamvan@ismail.com",
        "image" => "avatarwhite.jpg",
        "active" => 'about'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [TransactionController::class, 'index'])->name('transaction.index')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/posts/{post:slug}', [TransactionController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/transactions', AdminTransController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/categories/{id}/invoice', [TransactionController::class, 'invoice'])->name('transaction.invoice')->middleware('auth');

Route::resource('/dashboard/adminconfirm', AdminConfirmController::class)->middleware('auth');
Route::resource('/dashboard/checkout', CheckoutController::class)->middleware('auth');
Route::resource('/dashboard/room', RoomController::class)->middleware('auth');
Route::resource('/dashboard', ReportController::class)->middleware('auth');
