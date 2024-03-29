<?php

declare(strict_types=1);

namespace App\Http\Requests\Source;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'site' => ['required', 'string', 'min:5', 'max:20'],
            'url' => ['required', 'string',  'min:10'],
        ];
    }
}
