<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:20|min:4',
            'slug' => 'required|max:20|min:4',
            'parent_id' => [
                function ($attribute, $value, $fail) {
                    if ($value != 0 && !Category::find($value)) {
                        $fail($attribute, 'is invalid parent category');
                    }
                },
            ],
        ];
    }
}
