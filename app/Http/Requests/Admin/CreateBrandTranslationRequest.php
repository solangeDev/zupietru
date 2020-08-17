<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\BrandTranslation;

class CreateBrandTranslationRequest extends FormRequest
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
            "name" => "required|min:2|max:30",
            "language_id" => "required|integer",
            "brand_id" => "required|integer"
        ];
        /*return BrandTranslation::$rules;*/
    }
}
