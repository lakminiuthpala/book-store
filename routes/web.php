<?php

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

// Route::get('/', function () {
//     return view('filer');
// });
Route::get('/', [App\Http\Controllers\BookController::class, 'filterBook'])->name('filter-book');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'categoryList'])->name('category');

Route::get('/delete-category', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('category-delete');

Route::get('/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('add-category');

Route::get('/edit-category', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit-category');

Route::get('/update-category', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('update-category');

// book
Route::get('/book', [App\Http\Controllers\BookController::class, 'bookList'])->name('book');

Route::get('/delete-book', [App\Http\Controllers\BookController::class, 'deleteBook'])->name('delete-book');

Route::get('/add-book', [App\Http\Controllers\BookController::class, 'addBook'])->name('add-book');

Route::get('/edit-book', [App\Http\Controllers\BookController::class, 'editBook'])->name('edit-book');

Route::get('/update-book', [App\Http\Controllers\BookController::class, 'updateBook'])->name('update-book');

Route::get('/filter-book', [App\Http\Controllers\BookController::class, 'filterBook'])->name('filter-book');

Route::get('/filter-book-list', [App\Http\Controllers\BookController::class, 'displayFilteredBook'])->name('filter-book-list');

// cart
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');
