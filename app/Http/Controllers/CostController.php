<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostRequest;
use App\Models\Cost;
use App\Models\CostType;
use App\Models\PaymentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::with('payer', 'confirmer', 'costType')->get();
        return view('costs.costs-index', compact('costs'));
    }

    public function create()
    {
        $cost_types = CostType::all();
        $users = User::all();
        $user = Auth::user();
        $payment_types = PaymentType::all();
        return view('costs.costs-create', compact('cost_types', 'user', 'payment_types'));
    }

    public function store(CostRequest $request)
    {
        $cost = new Cost();
        $cost->employer_id = $request->employer_id;
        $cost->payer_id = $request->payer_id;
        $cost->confirmer_id = $request->confirmer_id;
        $cost->cost_type_id = $request->cost_type_id;
        $cost->description = $request->description;
        $cost->amount = $request->amount;
        $cost->payment_type_id = $request->payment_type_id;
        $cost->save();
        return redirect()->route('costs.index');
    }

    public function show(Cost $cost)
    {
        //
    }

    public function edit(Cost $cost)
    {
        $cost_types = CostType::all();
        $user = Auth::user();
        $payment_types = PaymentType::all();
        return view('costs.costs-edit', compact('cost', 'cost_types', 'user', 'payment_types'));
    }

    public function update(CostRequest $request, Cost $cost)
    {
        $cost->employer_id = $request->employer_id;
        $cost->payer_id = $request->payer_id;
        $cost->confirmer_id = $request->confirmer_id;
        $cost->cost_type_id = $request->cost_type_id;
        $cost->description = $request->description;
        $cost->amount = $request->amount;
        $cost->payment_type_id = $request->payment_type_id;
        $cost->save();
        return redirect()->route('costs.index');
    }

    public function destroy(Cost $cost)
    {
        if (true) {
            $cost->delete();
        }
        return redirect()->route('costs.index');
    }
}
