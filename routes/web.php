<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

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
Route::get('student-list', [UserController::class, 'view_user'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [UserController::class, 'view_user'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//my route
// Route::get('/dashboard', [UserController::class, 'view_user']);

//User Record Route
Route::get('create/record', [UserController::class, 'index'])->middleware(['auth', 'verified','role:Admin|Manager']);
Route::post('create/record' , [UserController::class, 'userData'])->middleware(['auth', 'verified','role:Admin|Manager']);
Route::get('/user_records',[UserController::class, 'view_user'])->middleware(['auth', 'verified','role:Admin|Manager|User']);

// CRUD Route
Route::get('datatable/{id}/edit',[CrudController::class, 'edit'])->middleware(['auth', 'verified','role:Admin|Manager|User']);
// Route Update Record
Route::put('update/record/{id}/edit', [CrudController::class, 'update'])->middleware(['auth', 'verified','role:Admin|Manager|User']);
//Route Delete Record
Route::get('datatable/{id}/delete', [CrudController::class, 'delete'])->middleware(['auth', 'verified','role:Admin|Manager']);


Route::middleware(['auth', 'verified','role:Admin'])->group(function (){
//User 
Route::get('user-list', [UserListController::class, 'index']);
Route::get('user/{id}/delete', [UserListController::class, 'userDelete']);

// User Role and Permission

Route::get('role/{id}/edit', [UserListController::class, 'editUserRole']);
Route::post('role/{id}/update', [UserListController::class, 'updataUserRole']);

//Role
Route::get('roles',[RoleController::class, 'index']);
Route::post('set-roles', [RoleController::class, 'setPermissionToRoles']);


});



Route::get('test', [UserController::class, 'test']);

//Role and Permission

Route::resource('roles', RoleController::class);
Route::resource('users', UsersController::class);
Route::resource('user_record', userController::class);




// test route
Route::get('farhan', [UserController::class, 'test']);

require __DIR__.'/auth.php';
