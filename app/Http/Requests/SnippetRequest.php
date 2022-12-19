<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $content
 * @property string $tags
 * @property boolean $public
 */
class SnippetRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'content' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'boolean' => ['nullable', 'boolean'],
        ];
    }
}
