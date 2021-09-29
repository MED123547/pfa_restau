<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactForm;
use App\Http\Controllers\MenuController;
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

Route::get('/hello', function (){
    dd('hello');
});

//Category management
Route::get('/admin/categorie', [CategoryController::class, 'index'])
    ->name('admin.categorie.index');
Route::put('/admin/category/edit/', [CategoryController::class, 'update'])
    ->name('admin.category.update');
Route::post('/admin/category/store', [CategoryController::class, 'store'])
    ->name('admin.category.store');
Route::get('/admin/category/delete/{category}', [CategoryController::class, 'destroy'])
    ->name('admin.category.destroy');

//Menu management
Route::get('/admin/menu', [MenuController::class, 'index'])
    ->name('admin.menu.index');
Route::put('/admin/menu/edit/', [MenuController::class, 'update'])
    ->name('admin.menu.update');
Route::post('/admin/menu/store', [MenuController::class, 'store'])
    ->name('admin.menu.store');
Route::get('/admin/menu/delete/{menu}', [MenuController::class, 'destroy'])
    ->name('admin.menu.destroy');

//Chef management
Route::get('/admin/chef', [ChefController::class, 'index'])
    ->name('admin.chef.index');
Route::put('/admin/chef/edit/', [ChefController::class, 'update'])
    ->name('admin.chef.update');
Route::post('/admin/chef/store', [ChefController::class, 'store'])
    ->name('admin.chef.store');
Route::get('/admin/chef/delete/{chef}', [ChefController::class, 'destroy'])
    ->name('admin.chef.destroy');

Route::get('/eclient', [ClientController::class, 'menuList'])
    ->name('menu.menuList');

Route::post('/contactForm',[ContactForm::class, 'sendMail'])
    ->name('sendMail');

Route::get('/reservation/create', [ClientController::class, 'createR'])->name('reservation.create');
Route::post('/reservation/store', [ClientController::class, 'storeR'])->name('reservation.store');
Route::get('/reservation', [ClientController::class, 'index'])->name('reservation.index');
Route::get('/reservation/accept/{reservation}', [ClientController::class, 'acceptReservation'])->name('reservation.accept');

Route::get('/', function () {
    return redirect()->route('admin.categorie.index');
});

