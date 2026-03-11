<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdmController;
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
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'catalog'])->name('catalog');
Route::get('/catalog/{id}', [App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.one');

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::post('/contact', [App\Http\Controllers\HomeController::class, 'submit'])->name('contact.post');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/sales', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');




Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

Auth::routes();
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'AdminHome'])->name('AdminHome');    
Route::get('/catalog', [App\Http\Controllers\Admin\CatalogAdm::class, 'CatalogHome'])->name('AdminCatalog');
Route::get('/catalog/create', [App\Http\Controllers\Admin\CatalogAdm::class, 'create'])->name('catalog.create');
Route::post('/catalog', [App\Http\Controllers\Admin\CatalogAdm::class, 'store'])->name('catalog.store');
Route::get('/catalog/{id}/edit', [App\Http\Controllers\Admin\CatalogAdm::class, 'edit'])->name('catalog.edit');
Route::put('/catalog/{id}', [App\Http\Controllers\Admin\CatalogAdm::class, 'update'])->name('catalog.update');
Route::delete('/catalog/{id}', [App\Http\Controllers\Admin\CatalogAdm::class, 'destroy'])->name('catalog.destroy');
});