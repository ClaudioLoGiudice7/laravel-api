<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;

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

Route::get('/', [GuestHomeController::class, "index"]);

// Route::get('/admin/projects', 'App\Http\Controllers\Admin\ProjectController@index')->name('admin.projects.index');

// Route::get('/admin/projects/create', 'App\Http\Controllers\Admin\ProjectController@create')->name('admin.projects.create');

// Route::post('/admin/projects', 'App\Http\Controllers\Admin\ProjectController@store')->name('admin.projects.store');

// Route::get('/admin/projects/{project}', 'App\Http\Controllers\Admin\ProjectController@show')->name('admin.projects.show');

// Route::get('/admin/projects/{project}/edit', 'App\Http\Controllers\Admin\ProjectController@edit')->name('admin.projects.edit');

// Route::put('/admin/projects/{project}', 'App\Http\Controllers\Admin\ProjectController@update')->name('admin.projects.update');

// Route::delete('/admin/projects/{project}', 'App\Http\Controllers\Admin\ProjectController@destroy')->name('admin.projects.destroy');

Route::get('/home', [AdminHomeController::class, "index"])->middleware('auth')->name('home');

Route::middleware("auth")
    ->prefix("/admin")
    ->name("admin.")
    ->group(function() {
        Route::resource("projects", ProjectController::class);
    });

Route::middleware('auth')
    ->prefix("profile") // * tutti gli url hanno il prefisso "/profile"
    ->name("profile.") // * tutti i nomi delle rotte hanno il prefisso "profile."
    ->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

require __DIR__ . '/auth.php';