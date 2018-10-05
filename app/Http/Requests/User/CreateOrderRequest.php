<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\ApiFormRequest;

class CreateOrderRequest extends ApiFormRequest
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
            'products' => 'required',
            'address' => 'required',
            'delivery_time' => 'required',
        ];
    }
}
