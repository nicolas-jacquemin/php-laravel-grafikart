<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['sometimes'],
            'done' => ['sometimes', 'boolean']
        ];
    }
}
