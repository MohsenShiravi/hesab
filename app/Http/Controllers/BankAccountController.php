<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{

    public function index()
    {
        $bank_accounts = BankAccount::all();
        return view('bank-accounts.bank-accounts-index',compact('bank_accounts'));
    }

    public function create()
    {
        return view('bank-accounts.bank-accounts-create');
    }


    public function store(BankAccountRequest $request)
    {

        $exist = Auth::user()->bankAccounts()->where('card_number', $request->card_number)->count();
        if(!$exist) {
            $bank_account = new BankAccount();
            $bank_account->store($request);
            return redirect()->route('bank-accounts.index');
        }else{
            return back()->with('error', 'شماره کارت تکراری می باشد');
        }

    }


    public function show(BankAccount $bank_account)
    {
        //
    }


    public function edit(BankAccount $bank_account)
    {
       return view('bank-accounts.bank-accounts-edit',compact('bank_account'));
    }


    public function update(BankAccountRequest $request, BankAccount $bank_account)
    {
        // آیا حساب بانکی دیگری با این شماره دارم؟ به جز شماره حساب فعلی
        $exist = Auth::user()->bankAccounts()->where('card_number', $request->card_number)->where('id','!=',$bank_account->id)->count();
        if(!$exist) {
            $bank_account->store($request);
            return redirect()->route('bank-accounts.index');
        }else{
            return back()->with('error', 'شماره کارت تکراری می باشد');
        }

    }


    public function destroy(BankAccount $bank_account)
    {
        if (true){
            $bank_account->delete();
        }
        return redirect()->route('bank-accounts.index');
    }
}
