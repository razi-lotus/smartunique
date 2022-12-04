<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\RequestController;

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
Route::group(['prefix' => 'admin','middleware' => ['auth']],function(){
    Route::get('/welcome', [HomeController::class, 'welcome'])->name('admin.welcome.screen');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');//->middleware('auth');
    Route::get('/userDashboard', [DashboardController::class, 'userDashboard'])->name('admin.userDashboard');//->middleware('auth');
    Route::get('/userTree', [DashboardController::class, 'userTree'])->name('admin.userTree');//->middleware('auth');
    Route::post('get-ref-users', [DashboardController::class, 'userRefTree']);
    Route::post('upgrade-account', [IndexController::class, 'upgradeAccount'])->name('admin.upgrade.account');
    Route::get('upgrade-account', [IndexController::class, 'secondUpgradation'])->name('admin.secondUpgrade');
    Route::post('second-upgradation', [IndexController::class, 'accountUpgradeRequest'])->name('admin.secondUpbradationRequest');

    Route::get('get-users-status', [DashboardController::class, 'getUserStatus']);//->middleware('auth');

    // Route::get('addBalance', [DashboardController::class, 'addBalance'])->name('admin.addBalance');//->middleware('auth');

    Route::post('/add/balance',[BalanceController::class,'add'])->name('admin.add.balance');
    Route::get('balance-transfer',[BalanceController::class,'balance_show'])->name('admin.balanceTransfer');
    Route::get('balance-listing', [DashboardController::class, 'BalanceList']);
    Route::get('user', [UserController::class, 'index'])->name('admin.users');

    Route::get('user-listing', [UserController::class, 'UserList']);
    Route::post('change-status', [UserController::class, 'changeStatus']);

    Route::get('requests', [RequestController::class, 'index'])->name('admin.requests');
    Route::get('request-listing', [RequestController::class, 'RequestList']);

    Route::get('withdrawal', [WithdrawalController::class, 'index'])->name('admin.withdrawal');
    Route::get('withdrawal-listing', [WithdrawalController::class, 'withdrawalList']);
    Route::post('prove-withdrawal', [WithdrawalController::class, 'proveWithdrawal']);

    Route::get('user-withdrawal', [WithdrawalController::class, 'user_withdrawal'])->name('admin.user_withdrawal');
    Route::post('withdraw-amount', [WithdrawalController::class, 'withdrawAmount'])->name('admin.withdraw.amount');
    Route::get('user-withdrawal-listing', [WithdrawalController::class, 'UserWithdrawalList']);

    Route::get('user_transactions', [TransactionsController::class, 'userTansaction'])->name('admin.user_transactions');
    Route::get('user-transaction-listing', [TransactionsController::class, 'userTransactionListing']);
    Route::get('transactions', [TransactionsController::class, 'transactions'])->name('admin.transactions');
    Route::get('transaction-listing', [TransactionsController::class, 'transactionsListing']);

    Route::get('sendWorkRequest', [WorkController::class, 'index'])->name('admin.sendWorkRequest');
    Route::post('sendWorkRequest', [WorkController::class, 'saveWork']);
    Route::get('user-work-listing', [WorkController::class, 'UserWorkListing']);
    Route::get('editwork/{id}/edit', [WorkController::class, 'show']);
    Route::post('editworkRequest', [WorkController::class, 'edit'])->name('admin.editWorkRequest');
    Route::post('delete-link', [WorkController::class, 'delete']);

    Route::get('WorkRequest', [WorkController::class, 'workRequests'])->name('admin.adminWorkRequests');
    Route::get('work-request-listing', [WorkController::class, 'workRequestsListing']);
    Route::get('show-request/{id}/show', [WorkController::class, 'showWhorkRequest'])->name('admin.showWhorkRequest');
    Route::post('approve-link', [WorkController::class, 'approveLink']);
    Route::post('approve-all-work-requests', [WorkController::class, 'ApproveAllRequests']);


});

Auth::routes();

