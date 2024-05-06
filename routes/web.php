<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudController;
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

Route::get('/', [UserController::class, 'view_user']);

//User Record Route
Route::get('create/record', [UserController::class, 'index']);
Route::post('create/record' , [UserController::class, 'userData']);
Route::get('/user_records',[UserController::class, 'view_user']);

// CRUD Route
Route::get('datatable/{user_id}/edit',[CrudController::class, 'edit']);
// Route Update Record
Route::put('update/record/{user_id}/edit', [CrudController::class, 'update']);
//Route Delete Record
Route::get('datatable/{user_id}/delete', [CrudController::class, 'delete']);


