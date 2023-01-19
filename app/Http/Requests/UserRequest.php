<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method_type) {
            case 'store':
                $rules =  [
                    'name'=>'required|max:255',
                    'mobile'=>"required|unique:users,mobile,null,id,deleted_at,null|max:255",
                    'email'=>"required|unique:users,email,null,id,deleted_at,null|max:255"
                ];
                break;

            case 'update':
                $rules = [
                    'name'=>'required|max:255',
                    'mobile'=>"required|unique:users,mobile,{$this->user_id},id,deleted_at,null|max:255",
                    'email'=>"required|unique:users,email,{$this->user_id},id,deleted_at,null|max:255",
                ];
                break;

            default:
                $rules = [];
                break;
        }
        return $rules;
    }

}
