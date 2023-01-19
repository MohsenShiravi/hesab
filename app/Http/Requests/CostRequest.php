<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'employer_id'=>['required'],
//            'payer_id'=>['required'],
//            'confirmer_id'=>['required'],
            'cost_type_id' => ['required'],
            'amount' => ['required', 'integer'],
            'description' => ['string'],

        ];
    }
}
