<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard()->check();
    }

    public function rules()
    {
        return [
            'experience_years' => ['required', 'integer', 'min:0', 'max:50'],
            'bio'              => ['nullable', 'string', 'max:1000'],
            'skills'           => ['required', 'array', 'min:1'],
            'skills.*'         => ['exists:skills,id'],
        ];
    }
}
