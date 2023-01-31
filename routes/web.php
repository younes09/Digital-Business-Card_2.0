<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VCardController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/editUser', [HomeController::class, 'edit'])->name('editUser');
Route::post('/updateUser/{id}', [HomeController::class, 'update'])->name('updateUser');
Route::post('/destroyUser/{id}', [HomeController::class, 'destroy'])->name('destroyUser');

Route::post('/vcard', VCardController::class)->name('download');

Route::resource('/cards', CardController::class);

Route::resource('/contacts', ContactController::class);

Route::get('/showUsers', [AdminController::class,'show_users']);
Route::get('/showUser/{user}', [AdminController::class,'show_user'])->name('user.show');
Route::get('/deletUser/{user}', [AdminController::class,'delet_user'])->name('user.destroy');
Route::get('/editUser/{user}', [AdminController::class,'edit_user'])->name('user.edit');
Route::post('/updateUserPlan/{user}', [AdminController::class,'update_user_plan'])->name('user.update');

Route::resource('/{page}', AdminController::class);
