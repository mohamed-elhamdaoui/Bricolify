<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard()->check();
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
