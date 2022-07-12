<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('users')->name('users.')->group(function (){
        Route::get('/list', [UserController::class, 'index'])->name('list');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/create',[UserController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[UserController::class,'update'])->name('update');
        Route::delete('/delete',[UserController::class,'destroy'])->name('delete');
    });
    Route::prefix('roles')->name('roles.')->group(function (){
        Route::get('/list', [RoleController::class, 'index'])->name('list');
        Route::get('/create',[RoleController::class,'create'])->name('create');
        Route::post('/create',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[RoleController::class,'update'])->name('update');
        Route::delete('/delete',[RoleController::class,'destroy'])->name('delete');
    });
    Route::prefix('permissions')->name('permissions.')->group(function (){
        Route::get('/list', [PermissionController::class, 'index'])->name('list');
        Route::get('/create',[PermissionController::class,'create'])->name('create');
        Route::post('/create',[PermissionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::put('/edit/{id}',[PermissionController::class,'update'])->name('update');
        Route::delete('/delete',[PermissionController::class,'destroy'])->name('delete');
    });

});
