<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ProductRequest extends FormRequest
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
        switch ($this->request->get('method_type')) {
            case 'store':
                $rules = [
                    'name' => 'required|unique:products,name,null,id,deleted_at,null|max:255',
                    'category_id' => 'required',
                    'content' => 'string',
                    'description' => 'string',
                    'weight' => 'required|numeric',
//                    'images.*' => 'nullable|image|mimes:jpeg,jpg,png',
                    'images.*' => [
                        'required',
                        File::image()
                            ->max(10 * 1024),
                    ],
                ];
                break;

            case 'update':
                $rules = [
                    'name' => 'required|unique:products,name,' . ($this->product_id) . ',id,deleted_at,null|max:255',
                    'category_id' => 'required',
                    'content' => 'string',
                    'description' => 'string',
                    'weight' => 'required|numeric',
//                    'images.*' => 'nullable|image|mimes:jpeg,jpg,png',
                    'images.*' => [
                        'required',
                        File::image()
                            ->max(10 * 1024),
                    ],
                ];
                break;

            default:
                $rules = [];
                break;
        }
        return $rules;
    }

}
