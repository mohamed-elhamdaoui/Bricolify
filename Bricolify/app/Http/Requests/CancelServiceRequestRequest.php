<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CancelServiceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check();
    }

    public function rules(): array
    {
        return [
            'reason' => ['required', 'string', 'max:500'],
        ];
    }

    /**
     * Helper method to get the validated reason
     * We don't need a DTO for a single primitive string parameter,
     * but we keep the extraction clean.
     */
    public function getReason(): string
    {
        return $this->validated('reason');
    }

    /**
     * Helper method to safely extract the role of the user cancelling
     * We take it from auth() to prevent spoofing via form inputs.
     */
    public function getRole(): string
    {
        return Auth::user()->role;
    }
}
