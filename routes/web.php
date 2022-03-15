<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//ログイン
Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
//新規会員登録
Route::get('user/register',[UserController::class,'index']);
Route::get('user/register',[UserController::class,'register']);
Route::get('/shoppinglist/list',[ShoppingListController::class,'list']);