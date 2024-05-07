<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;




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

Route::get('/dashboard', function () { return view('admin/dashboard'); })->middleware(['auth'])->name('dashboard');

Route::get('/transaction', [TransactionsController::class, 'transaction'])->middleware(['auth'])->name('TransactionManage');

Route::get('deposit', [TransactionsController::class, 'depositTransactions'])->middleware(['auth'])->name('TransactionDeposit');
Route::get('add-deposit', [TransactionsController::class, 'addDepositTransactions'])->middleware(['auth'])->name('TransactionDepositAdd');
Route::post('deposit', [TransactionsController::class, 'storeDepositTransactions'])->middleware(['auth'])->name('TransactionDepositstore');

Route::get('/withdrawal', [TransactionsController::class, 'withdrawTransactions'])->middleware(['auth'])->name('TransactionWithdraw');
Route::get('/add-withdrawal', [TransactionsController::class, 'addWithdrawTransactions'])->middleware(['auth'])->name('TransactionWithdrawAdd');
Route::post('/withdrawal', [TransactionsController::class, 'storeWithdrawepositTransactions'])->middleware(['auth'])->name('TransactionWithdrawstore');



require __DIR__.'/auth.php';