<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            // unique:roles,name,5,id,deleted_at,NULL'
            // unique:roles,name,NULL,id,deleted_at,NULL'
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . ($this->data_type == 'edit' ? $this->role_id : 'NULL') . ',id,deleted_at,NULL'],
            'display_name' => ['string', 'max:255'],
            'description' => ['string'],
        ];
    }
}
