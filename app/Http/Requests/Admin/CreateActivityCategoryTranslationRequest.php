<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\ActivityCategoryTranslation;

class CreateActivityCategoryTranslationRequest extends FormRequest
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
            "activity_category_id" => "required",
            "language_id" => "required|integer",
            "name" => "required|min:2|max:30",
        ];
        //return ActivityCategoryTranslation::$rules;
    }
}
