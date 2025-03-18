<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use illuminate\validation\Rules\Enum;
use App\Enums\CategoryEnum;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => ['required', new Enum(CategoryEnum::class)],
        ];
    }
    // required → nullや未選択を防ぐ
    public function messages(): array
    {
        return [
            'category.required' => 'カテゴリを選択してください。',
            'category.enum' => '無効なカテゴリが選択されています。',
        ];
    }
}
