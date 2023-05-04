<?php

namespace App\Modules\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogUpdateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string',
                'max:255',
                Rule::unique('blogs', 'name')->ignore($this->blog_id)
            ],
            'description' => 'string|nullable',
            'image' => 'nullable',
            'blog_id' => 'integer',
        ];
    }
}
