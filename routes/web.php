<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudController;
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
//


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [UserController::class, 'view_user'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [UserController::class, 'view_user'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//my route
// Route::get('/dashboard', [UserController::class, 'view_user']);

//User Record Route
Route::get('create/record', [UserController::class, 'index'])->middleware(['auth', 'verified']);
Route::post('create/record' , [UserController::class, 'userData'])->middleware(['auth', 'verified']);
Route::get('/user_records',[UserController::class, 'view_user'])->middleware(['auth', 'verified']);

// CRUD Route
Route::get('datatable/{id}/edit',[CrudController::class, 'edit'])->middleware(['auth', 'verified']);
// Route Update Record
Route::put('update/record/{id}/edit', [CrudController::class, 'update'])->middleware(['auth', 'verified']);
//Route Delete Record
Route::get('datatable/{id}/delete', [CrudController::class, 'delete'])->middleware(['auth', 'verified']);







Route::get('test', [UserController::class, 'test']);








// test route
Route::get('farhan', [UserController::class, 'test']);

require __DIR__.'/auth.php';
