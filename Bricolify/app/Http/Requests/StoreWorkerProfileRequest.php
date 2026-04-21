<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\DTOs\CreateWorkerProfileDTO;

class StoreWorkerProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard()->check(); // User must be logged in
    }

    public function rules(): array
    {
        return [
            'experience_years' => ['required', 'integer', 'min:0', 'max:50'],
            'bio'              => ['nullable', 'string', 'max:1000'],
            'skills'           => ['required', 'array', 'min:1'],
            'skills.*'         => ['exists:skills,id'],
        ];
    }

    public function toDTO(int $userId): CreateWorkerProfileDTO
    {
        return new CreateWorkerProfileDTO(
            userId: $userId,
            experienceYears: $this->validated('experience_years'),
            skillIds: $this->validated('skills'),
            bio: $this->validated('bio'),
        );
    }
}
