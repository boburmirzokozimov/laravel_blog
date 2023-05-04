<?php

namespace App\Modules\User\Requests;

use App\Modules\User\Model\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRoleRequest extends FormRequest
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
            'user' => 'required|exists:users,id',
            'role' => ['required', Rule::in(User::getRoles())],
        ];
    }
}
