<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:65'],
            'extract' => ['required_with:published_at', 'max:165'],
            'category_id' => ['required_with:published_at', 'exists:categories,id'],
            'body' => ['required_with:published_at'],
            'cover' => ['required_with:published_at', 'string', 'max:255'],
            'published_at' => ['nullable'],
            'tags' => ['array']
        ];
    }
}
