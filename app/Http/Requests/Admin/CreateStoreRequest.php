<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'manager_id' => 'required',
            'phone' => 'required|regex:/^0[0-9]{9,10}$/',
            'address' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'time_open' => 'required|date_format:"H:i:s"',
            'time_close' => 'required|date_format:"H:i:s"'
        ];
    }
}
