<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Order;

class CreateOrderRequest extends FormRequest
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
        $rules = [
            "delivery_address"  => "required|string|max:500",
            "subtotal"          => "required",
            "tax"               => "required",
            "total"             => "required",
        ];

        if ( $this->user_exists == 1 ) {
          $rules['user_id'] = 'required|integer|exists:users,id';
        }
        else {
          $rules['no_register_user_name']  = 'required|string|min:1|max:30';
          $rules['no_register_user_phone'] = 'required|string|min:1|max:30';
          $rules['no_register_user_email'] = 'required|string|min:1|max:30';
        }

        return $rules;
    }
}
