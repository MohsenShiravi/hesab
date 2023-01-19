<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.invoices-index', ['invoices' => $invoices]);
    }

    public function detailsInvoice(Invoice $invoice)
    {
        return view('invoices.invoices-details', ['invoice' => $invoice]);
    }

    public function create()
    {
        return view('invoices.invoices-create', [
            'vendors' => User::all(),
            'buyers' => User::all(),
        ]);
    }

    public function store(InvoiceRequest $request)
    {
        $vendor_id = $request->vendor_id;
        $buyer_id = $request->buyer_id;
        $vendor = User::query()->find($vendor_id);
        $buyer = User::query()->find($buyer_id);
        $vendor_count = $vendor->warehousesIOwn->count();
        $buyer_count= $buyer->warehousesIOwn->count();
        if ($vendor_count && $buyer_count) {
            Invoice::query()->create([
                'warehouse_entry_exit_id' => '1',
                'vendor_id' => $vendor_id ,
                'buyer_id' => $buyer_id,
                'personal_note' => $request->personal_note,
                'description' => $request->description,
                'status' => $request->status,
                'total_amount' => $request->total_amount,
                'post_barcode' => $request->post_barcode,
                'post_price' => $request->post_price,
                'total_shipping' => $request->total_shipping,
                'total_tax' => $request->total_tax,
                'how_much_paid' => $request->how_much_paid,
                'discount_id' => null,
                'discount_amount' => $request->discount_amount,
            ]);
        }

        return redirect(route('invoices.index'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.invoices-edit', [
            'invoice' => $invoice,
            'vendors' => User::all(),
            'buyers' => User::all(),
        ]);
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update([
            'warehouse_entry_exit_id'=>'1',
            'vendor_id' => $request->vendor_id,
            'buyer_id' => $request->buyer_id,
            'personal_note' => $request->personal_note,
            'description' => $request->description,
            'status' => $request->status,
            'total_amount' => $request->total_amount,
            'post_barcode' => $request->post_barcode,
            'post_price' => $request->post_price,
            'total_shipping' => $request->total_shipping,
            'total_tax' => $request->total_tax,
            'how_much_paid' => $request->how_much_paid,
            'discount_id' => '1',
            'discount_amount' => $request->discount_amount,
        ]);
        return redirect(route('invoices.index'));
    }

    public function dateOperation(Request $request,Invoice $invoice)
    {
        switch (true) {
            case $request->has('shipped_date'):
                $request->shipped_date=='accept' ? $invoice->update(['shipped_date' => now()]) : $invoice->update(['shipped_date'=>null]);
                break;
            case $request->has('delivery_date'):
                $request->delivery_date=='accept' ? $invoice->update(['delivery_date' => now()]) : $invoice->update(['delivery_date'=>null]);
                break;
            case $request->has('send_confirmed_at'):
                $request->send_confirmed_at=='accept' ? $invoice->update(['send_confirmed_at' => now()]) : $invoice->update(['send_confirmed_at'=>null]);
                break;
            case $request->has('receive_confirmed_at'):
                $request->receive_confirmed_at=='accept' ? $invoice->update(['receive_confirmed_at' => now()]) : $invoice->update(['receive_confirmed_at'=>null]);
                break;
        }
        return redirect(route('invoices.index'));
    }

    public function destroy(Invoice $invoice)
    {
        if (true) {
            $invoice->delete();
            return redirect(route('invoices.index'));
        }
    }
}
