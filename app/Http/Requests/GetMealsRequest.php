<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class GetMealsRequest extends FormRequest
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
            'per_page' => 'numeric|min:0',
            'page' => 'numeric|min:0',
            'category' => 'string',
            'tags' => 'string',
            'ingredients' => 'string',
            'with' => 'string',
            'lang' => 'required|string',
            'diff_time' => 'numeric'
        ];
    }
}
