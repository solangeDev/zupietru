<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\ProductTranslation;

class CreateProductTranslationRequest extends FormRequest
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
        return ProductTranslation::$rules;
        // return [
        //     "language_id" => "required|integer",
        //     "name" => "required|min:2|max:30",
        // ];
//          "subtitle" => "required|alpha_spaces"

            /*"start_at" => "required",
            "finish_at" => "required|after_or_equal:start_at",
            'bedprice' => 'required|numeric|min:0.01|max:999.99',
            'addprice' => 'numeric|min:0.01|max:999.99',
            'petsprice' => 'numeric|min:0.01|max:999.99',
            "name" => "required",
            "quantity" => "required",*/
    }
}
