<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'describe'      => 'required|string',
            'price'         => 'required|integer|min:0',
            'store_id'      => 'required|integer',
            'category_id'   => 'required|integer',
            'image.*'        => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
