<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'nickname' => ['string',
                'max:55',
                Rule::unique('users', 'nickname')->ignore($this->id)
            ],
            'name' => 'string|nullable',
            'surname' => 'string|nullable',
            'email' => ['string', Rule::unique('users', 'email')->ignore($this->id)],
            'avatar' => 'file|image|nullable',
            'banner' => 'file|image|nullable',
            'id' => 'integer',
            'password' => 'string|nullable',
        ];
    }
}
