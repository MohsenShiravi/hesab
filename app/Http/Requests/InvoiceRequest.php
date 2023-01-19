<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'vendor_id' => $this->missing('vendor_id') ? Auth::id() : $this->vendor_id,
            'buyer_id' => $this->missing('buyer_id') ? Auth::id() : $this->buyer_id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'vendor_id'=>['required'],
            'buyer_id'=>['required'],
            'personal_note' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'total_amount' => ['required'],
            'post_barcode' => ['required'],
            'post_price' => ['required'],
            'total_shipping' => ['required'],
            'total_tax' => ['required'],
            'how_much_paid' => ['required'],
            'discount_amount' => ['required'],
        ];
    }
}
