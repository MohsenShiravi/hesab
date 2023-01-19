<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Invoice;
use App\Models\User;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.transactions-index', ['transactions' => $transactions]);
    }

    public function create()
    {
        return view('transactions.transactions-create', [
            'payers' => User::all(),
            'payees' => User::all(),
        ]);
    }

    public function store(TransactionRequest $request)
    {
        transaction::query()->create([
            'payee_id' => $request->payee_id,
            'payer_id' => $request->payer_id,
            'amount' => $request->amount,
            'used_amount' => $request->used_amount,
            'tracking_code' => $request->tracking_code,
            'transaction_name' => $request->transaction_name,
            'description' => $request->description,
            'done_at' => jalaliToGregorian($request->done_at),
            'type' => $request->type,
        ]);
        return redirect(route('transactions.index'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.transactions-edit', [
            'transaction' => $transaction,
            'payers' => User::all(),
            'payees' => User::all(),
            'done_at' => gregorianToJalali($transaction->done_at)
        ]);
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update([
            'payee_id' => $request->payee_id,
            'payer_id' => $request->payer_id,
            'amount' => $request->amount,
            'used_amount' => $request->used_amount,
            'tracking_code' => $request->tracking_code,
            'transaction_name' => $request->transaction_name,
            'description' => $request->description,
            'done_at' => jalaliToGregorian($request->done_at),
            'type' => $request->type,
        ]);
        return redirect(route('transactions.index'));
    }

    public function destroy(Transaction $transaction)
    {
        if (true) {
            $transaction->delete();
            return redirect(route('transactions.index'));
        }
    }
}
