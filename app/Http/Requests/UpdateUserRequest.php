<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
            'full_name'      => 'string|max:255',
            'birthday'       => 'date_format:"Y-m-d"',
            'gender'         => 'integer|min:0|max:1',
            'phone'          => 'regex:/^0[0-9]{9,10}$/',
            'role_id'        => 'integer|min:1|max:3',
            'is_active'      => 'integer|min:0|max:1',
        ];
    }
}
