<?php

namespace App\Modules\Post\Requests;

use App\Modules\Post\Model\Post;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $post = Post::find($this->route('post'));

        return $this->user()->can('delete', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'blog' => 'required|string|exists:blogs,id',
            'post' => 'required|string|exists:posts,id'
        ];
    }
}
