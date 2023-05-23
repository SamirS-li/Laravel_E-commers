<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('admin/login',[\App\Http\Controllers\Admin\AdminController::class, 'loginView'])->name('admin.login-view');
Route::post('admin/login',[\App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware'=>['admin']],function (){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
    Route::get('/logout',[\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
});
