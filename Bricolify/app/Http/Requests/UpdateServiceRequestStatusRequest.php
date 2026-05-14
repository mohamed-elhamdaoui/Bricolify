<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequestStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check();
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'string', 'in:in_progress,completed'],
        ];
    }

    public function getStatus(): string
    {
        return $this->validated('status');
    }
}
