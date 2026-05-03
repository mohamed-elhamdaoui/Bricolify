<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequestRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard()->check();
    }

    public function rules()
    {
        return [
            'category_id'    => ['required', 'exists:categories,id'],
            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['required', 'string', 'max:2000'],
            'location'       => ['required', 'string', 'max:255'],
            'scheduled_date' => ['required', 'date', 'after_or_equal:today'],
            'image'          => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ];
    }
}
