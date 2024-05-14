<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ProductsController;
use App\Models\Category;
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
Route::get('/', [UserController::class, 'view_user'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-list'])->name('dashboard');
Route::get('student-list', [UserController::class, 'view_user'])->middleware(['auth', 'verified','role:Admin|Manager|User', 'permission:student-list'])->name('dashboard');
Route::get('/dashboard', [UserController::class, 'view_user'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-list'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//my route
// Route::get('/dashboard', [UserController::class, 'view_user']);

//User Record Route
Route::get('create/record', [UserController::class, 'index'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-create']);
Route::post('create/record' , [UserController::class, 'userData'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-create']);
Route::get('/user_records',[UserController::class, 'view_user'])->middleware(['auth', 'verified','role:Admin|Manager|User']);

// CRUD Route
Route::get('datatable/{id}/edit',[CrudController::class, 'edit'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-edit']);
// Route Update Record
Route::put('update/record/{id}/edit', [CrudController::class, 'update'])->middleware(['auth', 'verified','role:Admin|Manager|User','permission:student-edit']);
//Route Delete Record
Route::get('datatable/{id}/delete', [CrudController::class, 'delete'])->middleware(['auth', 'verified','role:Admin|Manager|user','permission:student-delete']);


Route::middleware(['auth', 'verified','role:Admin|Manager|User'])->group(function (){
//User 
Route::get('user-list', [UserListController::class, 'index'])->middleware('permission:user-list');
Route::get('user/{id}/delete', [UserListController::class, 'userDelete'])->middleware('permission:user-delete');

// User Role and Permission

Route::get('role/{id}/edit', [UserListController::class, 'editUserRole'])->middleware('permission:role-assign');
Route::post('role/{id}/update', [UserListController::class, 'updataUserRole'])->middleware('permission:role-assign');

//Role
Route::get('roles',[RoleController::class, 'index'])->middleware('permission:permission-list');
Route::post('set-roles', [RoleController::class, 'setRolePermission'])->middleware('permission:set-permission');


});


//Products Route

Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('add/product', [ProductsController::class, 'addProduct'])->name('product.addProduct');
Route::get('product/addtocart', [ProductsController::class, 'addToCart'])->name('product.addToCart');

Route::get('cart', [AddToCartController::class, 'index'])->name('cart.index');
Route::get('category/{id}', [ProductsController::class, 'categoryProduct'])->name('category.product');



Route::get('test', [UserController::class, 'test']);

//Role and Permission

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('user_record', userController::class);




// test route
Route::get('farhan', [UserController::class, 'test']);

require __DIR__.'/auth.php';
