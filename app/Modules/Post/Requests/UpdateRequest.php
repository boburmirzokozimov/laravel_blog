<?php

namespace App\Modules\Post\Requests;

use App\Modules\Post\Model\Post;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $post = Post::find($this->route('post'));

        return $this->user()->can('update', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:55',
            'editordata' => 'required|string',
            'main_photo' => 'file|image|nullable',
            'post' => 'required|string|exists:posts,id',
            'blog' => 'required|string|exists:blogs,id',
        ];
    }
}
