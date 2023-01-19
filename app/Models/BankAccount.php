<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store($request)
    {
        $card_number = str_replace("-","",$request->card_number);
        $this->user_id = Auth::id();
        $this->title = $request->title;
        $this->bank_name = $request->bank_name;
        $this->branch_name = $request->branch_name;
        $this->card_number = $card_number;
        $this->account_number = $request->account_number;
        $this->shaba_number = $request->shaba_number;
        $this->online_pay_link = $request->online_pay_link;
        $this->description = $request->description;
        return $this->save();
    }
}
