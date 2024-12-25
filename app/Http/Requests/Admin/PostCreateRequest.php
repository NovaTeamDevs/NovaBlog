<?php

namespace App\Http\Requests\Admin;

use App\Enum\PostStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'tags' => ['nullable', 'string', 'max:200'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'status' => ['required', Rule::enum(PostStatusEnum::class)],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'content' => ['required', 'string']
        ];
    }
}
