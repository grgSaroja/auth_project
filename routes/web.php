<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix'=>'admin'], function(){
    

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home')->middleware('auth:admin');
    Route::get('/register', [RegisterController::class, 'create'])->name('admin.register');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('admin.store');

    Route::get('/login', [LoginController::class, 'create'])->name('admin-login.create');
    Route::post('/login/store', [LoginController::class, 'store'])->name('admin-login.store');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('admin-logout.destroy');

});


require __DIR__.'/auth.php';
