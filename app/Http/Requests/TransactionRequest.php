<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
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
            'payee_id' => $this->missing('payee_id') ? Auth::id() : $this->payee_id,
            'payer_id' => $this->missing('payer_id') ? Auth::id() : $this->payer_id,
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
            'payee_id' => ['required'],
            'payer_id' => ['required'],
            'amount' => ['required'],
            'tracking_code' => ['required'],
            'transaction_name' => ['required'],
            'description' => ['required'],
            'type' => ['required'],
        ];
    }
}
