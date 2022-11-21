<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\UserController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');//->middleware('auth');

    Route::post('/add/balance',[BalanceController::class,'add'])->name('admin.add.balance');
    Route::get('balance-listing', [DashboardController::class, 'BalanceList']);
    Route::get('user', [UserController::class, 'index'])->name('admin.users');

    Route::get('user-listing', [UserController::class, 'UserList']);
    Route::post('change-status', [UserController::class, 'changeStatus']);

    Route::get('requests', [RequestController::class, 'index'])->name('admin.requests');
    Route::get('request-listing', [RequestController::class, 'RequestList']);
});

Auth::routes();

