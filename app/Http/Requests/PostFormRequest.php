<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostFormRequest extends FormRequest
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
            "title" => "required|unique:posts|min:4|max:60",
            "slug" => '',
            "imageUrl" => '',
            "category_id" => 'required|exists:categories,id',
            "description" => "required|min:30|max:255",
            "content" => "required|max:3000",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "slug" => Str::slug($this->input("title")),
            "imageUrl" => 'http://placehold.it/300x300',
            "category_id" => 2
        ]);
    }

}
