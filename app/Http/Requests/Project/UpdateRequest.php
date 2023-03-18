<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'lists' => ['required', 'array'],
            'lists.*.name' => ['required'],
            'lists.*.color' => ['required'],
        ];
    }
}
