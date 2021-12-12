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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    // crear usuario
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    //  guardar usuario
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    // lista usuario
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    // mostrar datos de usuario
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    // editar usuarios
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    // actualizar usuario
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    // eliminar usuario
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('motorcycles', App\Http\Controllers\MotorcycleController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});
