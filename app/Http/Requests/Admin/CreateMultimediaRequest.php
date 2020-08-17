<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin\Multimedia;

class CreateMultimediaRequest extends FormRequest
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
    /*public function rules()
    {
        return Multimedia::$rules;
    }*/

    public function rules()
    {
        return [
            'name' => 'image|mimes:jpg,png,gif,jpeg',
        ];
    }
}
