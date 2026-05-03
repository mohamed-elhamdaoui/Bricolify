<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard()->check();
    }

    public function rules()
    {
        return [
            'proposed_price' => ['required', 'numeric', 'min:0', 'max:999999'],
            'cover_message'  => ['nullable', 'string', 'max:1000'],
        ];
    }
}
