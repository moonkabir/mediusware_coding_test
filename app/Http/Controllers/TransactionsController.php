<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function transaction()
    {
        $userId = auth()->id();
        $transactions = Transactions::where('user_id', $userId)->get();
        return view('admin/transactions/manage', compact('transactions'));
    }

    public function depositTransactions()
    {
        $userId = auth()->id();
        $transactions = Transactions::where('transanction_type', 1)->where('user_id', $userId)->get();
        return view('admin/transactions/deposit', compact('transactions'));
    }
    public function addDepositTransactions()
    {
        return view('admin/transactions/add_deposit');
    }
    public function storeDepositTransactions(Request $request)
    {
        $request->validate([
            'amount' => ['required','numeric'],
        ]);
        $userId = auth()->id();
        $transactions = new Transactions();
        $transactions->user_id = $userId;
        $transactions->transanction_type = 1;
        $transactions->amount = $request->amount;
        $transactions->fee = $request->fee;
        $transactions->save();

        $user = User::findOrFail($userId);
        $user->balance = $user->balance +  $request->amount;
        $user->save();

        return redirect()->route('TransactionManage');
    }


    public function withdrawTransactions()
    {
        $userId = auth()->id();
        $transactions = Transactions::where('transanction_type', 2)->where('user_id', $userId)->get();
        return view('admin/transactions/withdraw', compact('transactions'));
    }
    public function addWithdrawTransactions()
    {
        return view('admin/transactions/add_withdraw');
    }
    public function storeWithdrawepositTransactions(Request $request)
    {
        $request->validate([
            'amount' => ['required','numeric'],
        ]);
        $userId = auth()->id();
        $user = User::findOrFail($userId);

        $accountType = $user->account_type;
        $transactions = new Transactions();
        $transactions->user_id = $userId;
        $transactions->transanction_type = 2;
        $transactions->amount = $request->amount;
        $transactions->fee = $transactions->CalculateFee($request->amount, $userId, $accountType);
        $transactions->save();        
        
        $user->balance = $user->balance -  $request->amount;
        $user->save();

        return redirect()->route('TransactionManage');
    }
}
